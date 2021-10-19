<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255', 'unique:sliders,name'],
            'text' => ['nullable', 'string'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام اسلایدر',
            'text' => 'توضیحات اسلایدر',
            'image' => 'تصویر اسلایدر'
        ];
    }
}
