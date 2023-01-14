<?php

namespace App\Http\Controllers;

use App\Config\AuthConstants;
use App\Config\CommonConstants;
use App\Mail\RegisterAccount;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('message', 'Thông tin đăng nhập không đúng!');
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

        $user = new User();
        $user->email = $req->email;
        $user->register_token = hash('sha256', AuthConstants::SECRET_STR. $req->email);
        $user->register_token_expired = date(CommonConstants::FORMAT_TIME, time() + 1800);
        $user->save();
        
        Mail::to($user->email)->send(new RegisterAccount($user->email, $user->id));

        return redirect()->route('confirm_register', ['token' => $user->register_token]);
    }

    public function confirmRegister(Request $req) {
        if(isset($req->token)) {
            $user = $this->userRepository->getUserByToken($req->token);
            if($user !== false) {
                return view('admin.pages.confirm_register')->with(['email' => $user->email]);
            } else {
                return view('admin.pages.confirm_register')->with(['alert' => 'token expired']);
            }
        }
        return view('admin.pages.error');
    }

    public function changePassword(Request $req) {
        if(isset($req->token) && isset($req->user_id)) {
            $user = $this->userRepository->getUserById($req->user_id);
            if($user !== false) {
                if($req->token === hash('sha256', $user->email . AuthConstants::CP_STR)) {
                    return view('admin.pages.change_password')->with(['email' => $user->email]);
                }
            }
        }

        return view('admin.pages.error');
    }
}
