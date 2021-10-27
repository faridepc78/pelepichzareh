<?php

namespace App\Http\Requests\Site;

use App\Models\Contact;
use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'type' => Contact::UNREAD
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'mobile' => ['required', 'numeric', 'digits:11', new ValidationMobile()],
            'text' => ['required', 'string'],
            'g-recaptcha-response' => ['required', 'captcha']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام',
            'company' => 'شرکت',
            'email' => 'ایمیل',
            'mobile' => 'تلفن همراه',
            'text' => 'پیام'
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'فیلد ریکپچا الزامی است.',
            'g-recaptcha-response.captcha' => 'لطفا فیلد ریکپچا را مجداد پر کنید.'
        ];
    }
}
