<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $id = request()->route('category');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $id],
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug,' . $id],
            'text' => ['nullable', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام دسته بندی',
            'slug' => 'اسلاگ دسته بندی',
            'text' => 'توضیحات دسته بندی'
        ];
    }
}
