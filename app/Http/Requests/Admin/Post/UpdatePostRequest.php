<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $id = request()->route('post');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:posts,name,' . $id],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug,' . $id],
            'bio' => ['required', 'string'],
            'text' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120']
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
