<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTypeRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'abbrev' => 'required|min:3|max:255',
        ];
    }
    public function  messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.min'=>'Tên thể loại nhỏ nhất 2 kí tự',
            'name.max'=>'Tên thể loại lớn nhất 255 kí tự',
            'abbrev.required'=>'Bạn chưa nhập tên viết tắt',
            'abbrev.min'=>'Tên viết tắt ít nhất 2 kí tự',
            'abbrev.max'=>'Tên viết tắt ít nhất 255 kí tự'
        ];
    }

}
