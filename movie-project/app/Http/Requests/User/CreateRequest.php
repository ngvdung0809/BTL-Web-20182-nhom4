<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'username' => ['required', 'min:3', 'max:255'],
            'name' => ['required', 'min:3', 'max:255'],
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'birth_day' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:9', 'max:15'],
            'country_id' => ['required', 'numeric'],
            'password' => ['required', 'min:6', 'confirmed']
        ];
    }

    public function  messages()
    {
        return [
            'username.required'=>'Bạn chưa nhập tên hiển thị',
            'username.min'=>'Tên hiển thị nhỏ nhất 3 kí tự',
            'username.max'=>'Tên hiển thị lớn nhất 255 kí tự',

            'name.required'=>'Bạn chưa nhập họ tên',
            'name.min'=>'Họ tên nhỏ nhất 3 kí tự',
            'name.max'=>'Họ tên lớn nhất 255 kí tự',

            'gender.required'=>'Bạn chưa chọn giới tính',

            'birth_day.required'=>'Bạn chưa chọn năm sinh',
            'birth_day.date'=>'Ngày sinh phải ở dạng date',

            'email.required'=>'Bạn chưa nhập địa chỉ email',
            'email.email'=>'Định dạng email không chính xác',
            'email.max'=>'Email lớn nhất 255 kí tự',
            'email.unique'=>'Email cuả bạn đã được đăng kí bởi người dùng khác',

            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.min'=>'Số điện thoại nhỏ nhất 9 kí tự',
            'phone.max'=>'Số điện thoại lớn nhất 255 kí tự',

            'country_d.required'=>'Bạn chưa chọn quốc gia',

            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu nhỏ nhất 6 kí tự',
            'password.confirmed'=>'Mật khẩu nhập không khớp'
        ];
    }
}
