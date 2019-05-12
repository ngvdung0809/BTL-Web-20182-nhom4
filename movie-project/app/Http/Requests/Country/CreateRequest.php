<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'abbrev' => ['required', 'string', 'min:2', 'max:255', 'unique:country']
        ];
    }

    public function  messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên quốc gia',
            'name.min'=>'Tên quốc gia nhỏ nhất 3 kí tự',
            'name.max'=>'Tên quốc gia lớn nhất 255 kí tự',
            'abbrev.required'=>'Bạn chưa nhập tên viết tắt quốc gia',
            'abbrev.min'=>'Tên viết tắt ít nhất 2 kí tự',
            'abbrev.max'=>'Tên viết tắt ít nhất 255 kí tự',
            'abbrev.unique'=>'Tên viết tắt bị trùng với tên viết tắt của quốc gia khác',
        ];
    }
}
