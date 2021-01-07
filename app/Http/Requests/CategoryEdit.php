<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckCategory;

class CategoryEdit extends FormRequest
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
            //'id' => ['sometimes',new Checkcategory($this->id)];如果不使用两个表单验证规则，就使用这个过滤id,对应模型获取也得改变
            'pid' => ['sometimes','required',new CheckCategory($this->id)],
            'name' => 'sometimes|required'
        ];
    }
}
