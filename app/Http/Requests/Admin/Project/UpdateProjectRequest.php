<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('project');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:projects,name,' . $id],
            'bio' => ['nullable', 'string', 'max:255', 'unique:projects,bio,' . $id],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120']
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
