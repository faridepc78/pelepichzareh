<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'bio' => ['nullable', 'string', 'max:255', 'unique:products,bio'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام محصول',
            'bio' => 'بیو محصول',
            'category_id' => 'دسته بندی محصول',
            'image' => 'تصویر محصول'
        ];
    }
}
