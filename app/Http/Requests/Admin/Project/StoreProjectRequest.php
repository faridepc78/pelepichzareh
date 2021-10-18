<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:projects,name'],
            'bio' => ['nullable', 'string', 'max:255', 'unique:projects,bio'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام پروژه',
            'bio' => 'بیو پروژه',
            'category_id' => 'دسته بندی پروژه',
            'image' => 'تصویر پروژه'
        ];
    }
}
