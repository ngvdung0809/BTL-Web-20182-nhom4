<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            //
            'name' => 'required|min:2|max:255|unique:type,name',
            'abbrev' => 'required|min:3|max:255',
        ];
    }
    public function  messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.string'=>'Tên quốc gia là chuỗi kí tự',
            'name.min'=>'Tên thể loại nhỏ nhất 2 kí tự',
            'name.max'=>'Tên thể loại lớn nhất 255 kí tự',
            'name.unique'=>'Tên thể loại đã tồn tại',
            'abbrev.required'=>'Bạn chưa nhập tên viết tắt',
            'abbrev.string'=>'Tên viết tắt là chuỗi kí tự',
            'abbrev.min'=>'Tên viết tắt ít nhất 2 kí tự',
            'abbrev.max'=>'Tên viết tắt ít nhất 255 kí tự'
        ];
    }
}
