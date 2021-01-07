<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreManagers;
use App\Manager;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mews\Captcha\Captcha;

class LoginController extends Controller
{
    //登录次数限制
    use ThrottlesLogins;

    //重写验证用户名的name
    public $username = 'username';

    //登录次数
    public $maxAttempts = 3;

    //登录界面
    public function login()
    {
        //
        if (Auth::check()){
            return redirect(route('admin.home'));
        }
        return view('admin.login.login');

    }

    //管理员登录
    public function store(Request $request)
    {
        //登录错误次数过多
        if($this->hasTooManyLoginAttempts($request)){

            $request->session()->flash('errormsg','错误登录次数过多，请稍后重试！');
            return redirect()->back();

        }
        $this -> validate($request,[
            'username' => 'required',
            'password' => 'required',
            'code' => 'required|captcha'
        ],[
            'code.required' => trans('validation.required'),
            'code.captcha' => trans('validation.captcha'),
        ]);
        //用户名密码验证
        $result = Auth::attempt(['username' => $request->username,'password' => $request->password]);

        if ($result) {

            if (Auth::user()->status == 0){

                $request->session()->flash('errormsg','账户状态异常');
                //增加登错次数
                $this->incrementLoginAttempts($request);

                Auth::logout();

                return redirect()->back();
            }
            return redirect(route('admin.home'));
        }else{
            $request->session()->flash('errormsg','用户名或密码错误');
            //增加登错次数
            $this->incrementLoginAttempts($request);
            return redirect()->back();
        }
    }

    //退出登录
    public function logout(){
        Auth::logout();
        return redirect(route('admin.login'));
    }

    //重定义验证的用户名
    public function username()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    //重定义验证的ip
    protected function throttleKey(Request $request)
    {
        return Str::lower('admin.'.$request->input($this->username())).'|'.$request->ip();
    }

    //注册界面
    public function register(){
        return view('admin.login.register');
    }

    //注册用户操作
    public function register_store(StoreManagers $request)
    {
        $Manger = new Manager();
        $Manger -> username = $request -> username;
        $Manger -> password = bcrypt($request -> password);
        $Manger -> email = $request -> email;
        $Manger -> status = 1;
        operation($Manger->save(),'注册');
        return redirect(route('admin.login'));
    }
}
