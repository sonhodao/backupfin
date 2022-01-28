<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchPriority extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'data' => 'required|array',
            'data.*.id' => 'required|integer',
            'data.*.priority' => 'required|integer',
        ];
    }
}
