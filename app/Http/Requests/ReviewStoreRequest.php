<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReviewStoreRequest extends FormRequest
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
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:accounts,id',
            'parent_id' => 'nullable',
            'body' => 'required|string',
            'file' => 'nullable',
           // 'g-recaptcha-response' => 'required|captcha',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge(
            [
            'user_id' => Auth::guard('account')->user()->id,
            ]
        );
    }

    public function messages()
    {
        return [
            'rating.required' => 'Bạn chưa đánh giá điểm sao, vui lòng đánh giá.',
            'full_name.required' => 'Vui lòng nhập họ tên',
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'email.required' => 'Vui lòng nhập Email.',
            'body.required' => 'Vui lòng nhập ý kiến.',
            'body.min' => 'Nội dung đánh giá quá ít. Vui lòng nhập thêm nội dung đánh giá về sản phẩm.',
         //   'g-recaptcha-response.required' => 'Vui lòng đánh dấu vào recaptcha.',
        ];
    }
}
