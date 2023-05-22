<?php

namespace App\Http\Requests;

use App\Rules\MobileValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:users', 'min:5', 'max:20'],
            'email' => ['required', 'unique:users', 'email'],
            'mobile' => ['required','unique:users',new MobileValidationRule()],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'نام کاربری الزامی است.',
            'name.unique' => 'نام کاربری تکراری است.',
            'name.min' => 'حداقل ۶ کاراکتر باشد.',
            'name.max' => 'حداکثر ۲۰ کاراکتر باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.unique' => 'ایمیل تکراری است.',
            'email.email' => 'ایمیل معتبر نیست.',


            'mobile.required' => 'شماره موبایل خود را وارد کنید.',
            'mobile.unique' => 'شماره موبایل وارد شده تکراری است.',
        ];
    }
}
