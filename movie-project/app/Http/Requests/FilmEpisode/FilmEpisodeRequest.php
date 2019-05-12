<?php

namespace App\Http\Requests\FilmEpisode;

use Illuminate\Foundation\Http\FormRequest;

class FilmEpisodeRequest extends FormRequest
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
            'episode' => 'required|numeric',
            'image' => ['required', 'image'],
            'content'=>'required|min:3',
        ];
    }
    public function  messages(){
        return [
            'episode.required'=>'Bạn chưa nhập tập phim',
            'image.required'=>'Bạn chưa chọn ảnh cho tập phim',
            'image.image'=>'File của bạn phải là định dạng ảnh',
            'content.required'=>'Bạn chưa mô tả cho tập phim'

        ];
    }
}
