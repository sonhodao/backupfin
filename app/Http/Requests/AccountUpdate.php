<?php

namespace App\Http\Requests;

use App\Rules\AccountPassword;
use Botble\Support\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class AccountUpdate extends FormRequest
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

            'cur_password' =>  ['required', 'string', 'max:255', new AccountPassword],
            'name' => 'required|string',
            'password' => 'required|string|min:6',
            'conf_password' => 'required|string|min:6|same:password',
        ];
    }
}
