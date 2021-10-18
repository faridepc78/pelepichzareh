<?php

namespace App\Http\Requests\Admin\Profile;

use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'mobile' => ['required', 'numeric', 'digits:11', new ValidationMobile()],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'f_name' => 'نام',
            'l_name' => 'نام خانوادگی',
            'email' => 'ایمیل',
            'mobile' => 'تلفن همراه',
            'password' => 'رمز عبور',
            'image' => 'تصویر پروفایل'
        ];
    }
}
