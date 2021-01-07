<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCases extends FormRequest
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
    //编写验证规则
    public function rules()
    {
        return [
            //
            'title' => 'required',
            'remark' => 'required',
            'picture' => 'image',
        ];
    }

    // 自定义验证属性
    public function attributes()
    {
        return[
            'remark' => '摘要',
            'picture' => '图片',
        ];
    }
}
