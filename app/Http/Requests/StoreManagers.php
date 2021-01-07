<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreManagers extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'username' => 'required|unique:managers,username',
            'password' => 'required|min:6',
            'repassword' => 'required|min:6|same:password',
            'email' => 'email',
            'service' => 'required'
        ];
    }
    //自定义错误信息
    public function messages()
    {
        return[
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已存在',
            'password.required' => '密码不能为空',
            'repassword.required' => '密码不能为空',
            'password.min' => '密码长度不能小于6位',
            'repassword.min' => '密码长度不能小于6位',
            'repassword.same' => '两次密码不一致',
            'email.email' => '邮箱格式输入错误',
            'service.required' => '必须勾选我同意所有条款和条件'
        ];
    }
}
