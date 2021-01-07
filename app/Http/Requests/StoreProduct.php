<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckProduct;

class StoreProduct extends FormRequest
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
            'pid' => ['required','integer',new CheckProduct],
            'productname' => 'required',
            'remark' => 'required',
            'picture' => 'image',
            'contents' => 'required',
        ];
    }

    public function messages(){
        return [
            'pid.required' => '请先添加分类',
        ];
    }
}
