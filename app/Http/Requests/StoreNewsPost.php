<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //判断用户是否有权限进行此请求
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //编写验证规则
    public function rules()
    {
        return [
            //
            'newstitle' => 'required|max:16',
            'contents' => 'required',
            'read' => 'required|integer',
        ];
    }

    //自定义错误信息
    public function messages()
    {
        return[
            'newstitle.required' => '标题不能为空',
            'newstitle.max' => '标题长度不能超过16',
            'contents.required' => '新闻内容不能为空',
            'read.required' => '浏览次数不能为空',
            'read.integer' => '浏览次数必须为整数',
        ];    
    }

    // 自定义验证属性
    public function attributes()
    {
        return[
            'read' => '浏览次数',
        ];
    }
}
