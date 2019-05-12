<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class ServerRequest extends FormRequest
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
           'name' => ['required', 'min:2', 'max:255'],
           'episode_id' => ['required', 'integer'],
           'link' => ['required', 'min:3', 'max:255'],
        ];
    }
    public function  messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên server',
            'name.min'=>'Tên server phải từ 2 kí tự trở lên',
            'name.max'=>'Tên server lớn nhất 255 kí tự',
            
            'episode_id.required'=>'Bạn chưa nhập mã tập phim',
            'episode_id.integer'=>'Định dạng mã tập phim phải là số',

            'link.required'=>'Bạn chưa nhập link',
            'link.min'=>'Link phải từ 3 kí tự trở lên',
            'link.max'=>'Link lớn nhất 255 kí tự',
        ];
    }
}
