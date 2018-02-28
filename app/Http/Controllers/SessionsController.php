<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        // Auth::attempt()方法 帮助我们完成用户认证
        if(Auth::attempt($credentials, $request->has('remember'))) {
            //登陆成功后的相关操作
            session()->flash('success', 'Successfully Login, Welcome');
            //intended 该方法可将页面重定向到上一次请求尝试访问的页面上
            return redirect()->intended(route('users.show', [Auth::user()] )); //Auth::user() 方法来获取 当前登录用户 的信息，并将数据传送给路由

        } else {
            //登录失败后的相关操作
            session()->flash('danger', 'Sorry, email or password is wrong!');
            return redirect()->back();

        }

    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'Successfully Logout');
        return redirect('login');
    }
}
