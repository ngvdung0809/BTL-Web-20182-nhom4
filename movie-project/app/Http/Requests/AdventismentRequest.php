<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdventismentRequest extends FormRequest
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
            'name'=>'required|min:1|max:255|unique:type,name',
            'image'=>'required|min:4|max:255',
            'link'=>'required|min:4|max:255',
            'active'=>'required'

        ];
    }

    public function messages(){ 
        return[ 
            'name.required'=>'Bạn chưa nhập tên quảng cáo',
            'name.min'=>'Tên quảng cáo ít nhất 1 kí tự ',
            'name.max'=>'Tên quảng cáo nhiểu nhất 255 kí tự',
            'name.unique'=>'Tên quảng cáo đã tồn tại',
            'image.required'=>'Bạn chưa nhập link ảnh',
            'image.min'=>'Link ảnh ít nhất 4 kí tự ',
            'image.max'=>'Link ảnh nhiểu nhất 255 kí tự',
            'link.required'=>'Bạn chưa nhập link quảng cáo',
            'link.min'=>'Link quảng cáo ít nhất 4 kí tự ',
            'link.max'=>'Link quảng cáo nhiểu nhất 255 kí tự',
            'active.required'=>'Phải nhập trường active',
        ];
    }
}
