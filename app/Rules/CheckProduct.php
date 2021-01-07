<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Category;

class CheckProduct implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //如果含有子类，则返回false
        $data = Category::subclass($value);
        if ($data === [$value]) {
            return true;
        }else{
            return false;
        }        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '不能在该分类下添加产品';
    }
}
