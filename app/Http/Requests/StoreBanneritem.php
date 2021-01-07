<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBanneritem extends FormRequest
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
            'banner_id' => 'required|Checkbanneritem',
            'file' => 'sometimes',
            'picture' => 'image',
            'digest' => 'required',
        ];
    }
    // 自定义验证属性
    public function attributes()
    {
        return[
            'picture' => '图片',
            'file' => '图片',
        ];
    }
}
