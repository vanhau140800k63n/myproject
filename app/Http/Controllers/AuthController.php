<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.pages.user_pages.login');
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
            return view('admin.pages.user_pages.register');
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
                'name' => 'required|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:30',
                'phone' => 'required|max:15|regex:/[0]\d{9,11}$/'
            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.regex' => 'Số điện thoại không hợp lệ',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email này đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu quá ngắn (ít nhất 6 ký tự)',
            ]
        );

        $user = new User();
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->password = Hash::make($req->password);
        $user->password_show = $req->password;
        $user->current_movies = '1,2,3,4,5,6';
        $user->view_movies = '.1-0+0 .2-0+0 .3-0+0 .4-0+0 .5-0+0 .6-0+0';

        $user->save();

        $alert = 'Đăng kí tài khoản thành công';
        return redirect()->back()->with('alert', $alert);
    }
}
