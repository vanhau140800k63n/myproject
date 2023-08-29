<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Config\AuthConstants;
use App\Mail\RegisterAccount;
use App\Config\CommonConstants;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\PageException;
use Throwable;

class AuthController extends Controller
{
    private $userRepository;
    private $postRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PostRepositoryInterface $postRepository
    ) {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            $prev_url = url()->previous();
            return view('admin.pages.login', compact('prev_url'));
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getRegister()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.pages.register');
        }
    }

    public function forgotPassword()
    {
        // return view('admin.pages.error');
        return view('admin.pages.forgot_password');
    }

    public function postForgotPassword(Request $req)
    {
        // return view('admin.pages.error');
        $this->validate(
            $req,
            [
                'email' => 'required|email',
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
            ]
        );

        $user = $this->userRepository->getUserByEmail($req->email);
        if ($user !== false) {
            $dataUpdate = [
                'token' => hash('sha256', AuthConstants::SECRET_STR . $req->email . time()),
                'token_expired' => date(CommonConstants::FORMAT_TIME, time() + 1800)
            ];

            $userUpdate = $this->userRepository->updateUser($user->id, $dataUpdate);
            if ($userUpdate !== false) {
                Mail::to($user->email)->send(new ResetPassword($user->email, $user->id, $dataUpdate['token']));
                return redirect()->route('confirm_reset_password')->with('user_id', $user->id);
            }
        }

        return redirect()->back()->with('alert', 'Email không đúng');
    }

    public function postLogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.email' => 'Email bạn nhập không đúng định dạng',
                'password.required' => 'Bạn chưa nhập password',
                'email.required' => 'Bạn chưa nhập email',
            ]
        );

        $credentials = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($credentials)) {
            if ($req->has('prev_url')) {
                return redirect()->to($req->prev_url);
            }
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('alert', 'Thông tin đăng nhập không đúng!');
        }
    }

    public function postRegister(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email|unique:users,email',
                'phone' => 'required'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã được đăng ký, bạn có thể bấm quên mật khẩu để lấy lại tài khoản',
            ]
        );

        $dataCreate = [
            'phone' => $req->phone,
            'email' => $req->email,
            'token' => hash('sha256', AuthConstants::SECRET_STR . $req->email . time()),
            'token_expired' => date(CommonConstants::FORMAT_TIME, time() + 1800)
        ];

        $user = $this->userRepository->createUser($dataCreate);

        if ($user !== false) {
            // return redirect()->route('change_password', ['user_id' => $user->id, 'token' => $user->token]);
            Mail::to($user->email)->send(new RegisterAccount($user->email, $user->id, $user->token));
        }

        // return view('admin.pages.error');
        return redirect()->route('confirm_register')->with('user_id', $user->id);
    }

    public function confirmRegister()
    {
        if (Session::has('user_id')) {
            $user = $this->userRepository->getUserById(Session::get('user_id'));
            if ($user !== false) {
                return view('admin.pages.confirm_register')->with(['email' => $user->email]);
            } else {
                return view('admin.pages.confirm_register')->with(['alert' => 'token expired']);
            }
        }
        return view('admin.pages.error');
    }

    public function confirmResetPassword()
    {
        if (Session::has('user_id')) {
            $user = $this->userRepository->getUserById(Session::get('user_id'));
            if ($user !== false) {
                return view('admin.pages.confirm_reset_password')->with(['email' => $user->email]);
            } else {
                return view('admin.pages.confirm_reset_password')->with(['alert' => 'token expired']);
            }
        }
        return view('admin.pages.error');
    }

    public function changePassword(Request $req)
    {
        if (isset($req->token) && isset($req->user_id)) {
            $user = $this->userRepository->getUserByToken($req->user_id, $req->token);
            if ($user !== false) {
                $changeStatus = $this->userRepository->changeStatus($user->id, AuthConstants::RESET_PASSWORD);
                return view('admin.pages.change_password')->with(['email' => $user->email, 'user_id' => $user->id, 'token' => $req->token]);
            }
        }

        return view('admin.pages.error');
    }

    public function postChangePassword(Request $req)
    {
        $this->validate(
            $req,
            [
                'pass' => 'required|min:6|max:30|same:pass_confirm',
                'user_id' => 'required'
            ],
            [
                'pass.required' => 'Vui lòng nhập mật khẩu',
                'pass.min' => 'Mật khẩu dưới 6 ký tự',
                'pass.max' => 'Mật khẩu vượt quá 30 ký tự',
                'pass.same' => 'Mật khẩu không trùng khớp',
                'user_id.required' => 'Tài khoản không tồn tại'
            ]
        );

        $user = $this->userRepository->getUserChangePassword($req->user_id);
        if ($user !== false) {
            $user = $this->userRepository->updatePassword($user->id, $req->pass);
            return redirect()->route('change_password_success')->with('noti', 'Success');
        }

        return view('admin.pages.error');
    }

    public function changePasswordSuccess()
    {
        if (Session::has('noti')) {
            return view('admin.pages.change_password_success');
        } else {
            return view('admin.pages.error');
        }
    }

    public function getUserInfo()
    {
        if (Auth::id()) {
            $user = $this->userRepository->getUserById(Auth::id());
            if ($user !== null) {
                $posts = $this->postRepository->getPostAction(Auth::id());
                return view('pages.user.info', compact('user', 'posts'));
            }
        }

        return view('pages.errors.error404');
    }

    public function updateUserInfo(Request $req)
    {
        $data_path = null;
        if ($req->hasFile('avata')) {
            $avata = $req->file('avata');
            $name = 'avata_user' . Auth::id() . time();
            $data_path = $name . '.' . pathinfo($avata->getClientOriginalName(), PATHINFO_EXTENSION);
            $avata->move('img/avata_user/', $data_path);

            if (Auth::user()->avata !== null && Auth::user()->avata !== 'img/no_avata.jpg') {
                File::delete(Auth::user()->avata);
            }
        }

        $data = $req->all();
        if (!(array_key_exists('first_name', $data) && array_key_exists('first_name', $data) && array_key_exists('phone', $data))) {
            return redirect()->back()->with('error', 'Cập nhật lỗi');
        }

        $dataUpdate = [
            'first_name' => empty($data['first_name']) ? '' : $data['first_name'],
            'last_name' => empty($data['last_name']) ? '' : $data['last_name'],
            'phone' => $data['phone']
        ];

        if (!is_null($data_path)) {
            $dataUpdate['avata'] = 'img/avata_user/' . $data_path;
        }

        $user = $this->userRepository->updateUserInfo($dataUpdate);

        return redirect()->back()->with('noti', 'Cập nhật thông tin thành công');
    }

    public function authGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function authGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = $this->userRepository->findGoogleUser($user->email, $user->id);

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('home');
            } else {
                $dataGoogleUser = [
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('devsnevn')
                ];

                $newUser = $this->userRepository->createUser($dataGoogleUser);

                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (Throwable $e) {
            throw new PageException();
        }
    }
}
