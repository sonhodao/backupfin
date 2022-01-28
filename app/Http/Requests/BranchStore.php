<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->can('branches.store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'thumbnail' => 'required|string',
            'address' => 'required|string',
            'district' => 'required|string',
            'province' => 'required|string',
            'hotline' => 'required|string',
            'google_map' => 'nullable|string',
        ];
    }
}
