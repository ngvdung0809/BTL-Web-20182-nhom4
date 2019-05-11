<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current-password' => 'required',
            'new-password' => 'required|min:6|confirmed',
        ];
    }

    public function  messages()
    {
        return [
            'current-password.required'=>'Bạn chưa nhập mật khẩu hiện tại',

            'new-password.required'=>'Bạn chưa nhập mật khẩu mới',
            'new-password.min'=>'Mật khẩu mới nhỏ nhất 3 kí tự',
            'new-password.confirmed'=>'Mật khẩu mới không khớp',
        ];
    }
}
