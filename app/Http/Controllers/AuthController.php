<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Config\AuthConstants;
use App\Mail\RegisterAccount;
use App\Config\CommonConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Repositories\UserRepositoryInterface;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.pages.login');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
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
        return view('admin.pages.forgot_password');
    }

    public function postForgotPassword(Request $req)
    {
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
                'token' => hash('sha256', AuthConstants::SECRET_STR . $req->email. time()),
                'token_expired' => date(CommonConstants::FORMAT_TIME, time() + 1800)
            ];

            $userUpdate = $this->userRepository->updateUser($user->id, $dataUpdate);
            if ($userUpdate !== false) {
                Mail::to($user->email)->send(new ResetPassword($user->email, $user->id, $dataUpdate['token']));
                return redirect()->route('confirm_reset_password', ['user_id' => $user->id]);
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
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã được đăng ký, bạn có thể bấm quên mật khẩu để lấy lại tài khoản',
            ]
        );

        $dataCreate = [
            'email' => $req->email,
            'token' => hash('sha256', AuthConstants::SECRET_STR . $req->email . time()),
            'token_expired' => date(CommonConstants::FORMAT_TIME, time() + 1800)
        ];

        $user = $this->userRepository->createUser($dataCreate);

        if ($user !== false) {
            Mail::to($user->email)->send(new RegisterAccount($user->email, $user->id, $user->token));
        }

        return redirect()->route('confirm_register', ['user_id' => $user->id]);
    }

    public function confirmRegister(Request $req)
    {
        if (isset($req->user_id)) {
            $user = $this->userRepository->getUserById($req->user_id);
            if ($user !== false) {
                return view('admin.pages.confirm_register')->with(['email' => $user->email]);
            } else {
                return view('admin.pages.confirm_register')->with(['alert' => 'token expired']);
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

    public function confirmResetPassword(Request $req)
    {
        if (isset($req->user_id)) {
            $user = $this->userRepository->getUserById($req->user_id);
            if ($user !== false) {
                return view('admin.pages.confirm_reset_password')->with(['email' => $user->email]);
            } else {
                return view('admin.pages.confirm_reset_password')->with(['alert' => 'token expired']);
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
        }

        return 1;
    }
}
