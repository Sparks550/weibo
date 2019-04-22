<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Mod;
use Auth;

class AdminController extends Controller
{
    //管理员登录
    public function login()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        $user = new User;
        dd($user->email);
        dd($request->email);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎进入超级管理员界面！');
            dd(1);
            return redirect()->intended(route('admin.show', [Auth::user()]));
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }
}
