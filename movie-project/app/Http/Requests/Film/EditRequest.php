<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'min:3', 'max:255'],
            'tag' => ['required', 'min:3', 'max:255'],
            'type_id.*' => ['required'],
            'publisher_id' => ['required', 'integer'],
            'director_id' => ['required', 'integer'],
            'actor_id.*' => ['required'],
            'country_id' => ['required', 'integer'],
            'released' => ['required', 'date'],
            'content' => ['required', 'min:6'],
        ];
    }

    public function  messages()
    {
        return [
            'name.required'=>'Bạn chưa nhập tên phim',
            'name.min'=>'Tên phim nhỏ nhất 3 kí tự',
            'name.max'=>'Tên phim lớn nhất 255 kí tự',

            'tag.required'=>'Bạn chưa nhập tag',
            'tag.min'=>'Tag nhỏ nhất 3 kí tự',
            'tag.max'=>'Tag lớn nhất 255 kí tự',

            'type_id.*.required'=>'Bạn chưa chọn thể loại phim',

            'publisher_id.required'=>'Bạn chưa chọn hãng sản xuất',
            'publisher_id.integer' => 'Định dạng hãng sản xuất không chính xác',

            'director_id.required'=>'Bạn chưa chọn đạo diễn',
            'director_id.integer' => 'Định dạng đạo diễn không chính xác',

            'actor_id.*.required'=>'Bạn chưa chọn diễn viên',

            'country_id.required'=>'Bạn chưa chọn quốc gia',
            'country_id.numeric' => 'Định dạng quốc gia không chính xác',

            'released.required'=>'Bạn chưa nhập năm xuất bản',
            'released.date'=>'Định dạng năm xuất không chính xác',

            'content.required'=>'Bạn chưa nhập nội dung phim',
            'content.min'=>'Nội dung phim ít nhất 6 kí tự',
        ];
    }
}
