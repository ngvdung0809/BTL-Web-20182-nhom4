<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'min:9', 'max:15'],
            'country_id' => ['required', 'numeric'],
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

            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.min'=>'Số điện thoại nhỏ nhất 9 kí tự',
            'phone.max'=>'Số điện thoại lớn nhất 255 kí tự',

            'country_id.required'=>'Bạn chưa chọn quốc gia',
        ];
    }
}
