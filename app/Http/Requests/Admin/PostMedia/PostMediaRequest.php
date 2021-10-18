<?php

namespace App\Http\Requests\Admin\PostMedia;

use Illuminate\Foundation\Http\FormRequest;

class PostMediaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'post_id' => request()->route('post_id')
        ]);
    }

    public function rules()
    {
        return [
            'media' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'media' => 'تصویر مدیا پست'
        ];
    }
}
