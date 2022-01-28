<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuItemUpdate extends FormRequest
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
            'label' => "required|string",
            'link' => "required|string",
            'color' => "nullable|string",
            'icon' => "nullable|string",
            'text' => "nullable|string",
            'thumbnail' => 'nullable|string',
            'is_home' => "nullable|boolean",
            'sort' => "nullable|integer",
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(
            [
            'is_home' => $this->is_home ?? false,
            ]
        );
    }
}
