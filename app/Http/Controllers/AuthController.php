<?php

namespace App\Http\Controllers;

use App\Mail\RegisterAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
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
                'email.unique' => 'Email này đã tồn tại',
            ]
        );

        $user = new User();
        $user->email = $req->email;
        $user->save();
        
        Mail::to($user->email)->send(new RegisterAccount($user->email));

        return redirect()->route('confirm_register');
    }

    public function confirmRegister($req) {
        return view('admin.pages.confirm_register');
    }
}
