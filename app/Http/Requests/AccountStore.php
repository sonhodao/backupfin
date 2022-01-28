<?php

namespace App\Http\Requests;

use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;

class AccountStore extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:accounts',
            'password' => 'required|string|min:6',
            'name' => 'required|string|min:3',
            'mobile' => 'required|phone:VN|unique:accounts',
            'username' => 'required|string|unique:accounts',
            'g-recaptcha-response' => new Captcha(),
        ];
    }
}
