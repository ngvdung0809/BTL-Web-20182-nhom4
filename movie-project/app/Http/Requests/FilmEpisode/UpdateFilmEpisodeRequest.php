<?php

namespace App\Http\Requests\FilmEpisode;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmEpisodeRequest extends FormRequest
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
            'content'=>'required|min:3',
        ];
    }
    public function  messages(){
        return [
            'episode.required'=>'Bạn chưa nhập tập phim',
            'content.required'=>'Bạn chưa mô tả cho tập phim'
        ];
    }
}
