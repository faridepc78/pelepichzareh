<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'slug' => str_slug_persian(request('slug'))
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:posts,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug'],
            'bio' => ['required', 'string'],
            'text' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام پست',
            'slug' => 'اسلاگ پست',
            'bio' => 'بیو پست',
            'text' => 'توضیحات پست',
            'category_id' => 'دسته بندی پست',
            'image' => 'تصویر پست'
        ];
    }
}
