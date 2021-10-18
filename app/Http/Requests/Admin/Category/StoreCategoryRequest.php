<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        if (request()->routeIs('products.c_store')) {
            $type = Category::PRODUCT;
        } elseif (request()->routeIs('projects.c_store')) {
            $type = Category::PROJECT;
        } elseif (request()->routeIs('posts.c_store')) {
            $type = Category::POST;
        }

        return $this->merge([
            'slug' => str_slug_persian(request('slug')),
            'type' => $type
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug'],
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
