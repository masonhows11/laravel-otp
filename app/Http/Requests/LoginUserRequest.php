<?php

namespace App\Http\Requests;

use App\Rules\MobileValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'mobile' => ['required',new MobileValidationRule()],
            //'token' => ['required','digits:6']
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
            'mobile.required' => 'شماره موبایل خود را وارد کنید.',
            'mobile.exists' => 'شماره موبایل وارد شده وجود ندارد.',

//            'token.required' => 'کد فعال سازی الزامی است.',
//            'token.digits' => 'کد فعال سازی معتبر نمی باشد.',
        ];
    }

}
