<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteApp extends FormRequest
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

            'title'         =>   'required|max:30',
            'reason'        =>   'max:30',
            'content'              =>   'required',
            'name_writer'       =>  'required',
            'ask'       =>  'required|max:30',
        ];

    }
    public function messages()
    {
        return [
            'title.required'     =>  "Chưa có tiêu đề!",
            'title.max'     =>  "Tiêu đề tối đa 30 kí tự",
            'reason.max'  =>  "Lý do tối đa 30 chữ",
            'ask.max'  =>  "Câu hỏi đề ra tối đa 30 chữ",
            'ask.required'  =>  "Cần 1 câu hỏi?",
            'content.required'  =>  "Vui lòng điền nội dung",
            'name_writer.required'  =>  "Hãy để lại 1 cái tên",
        ];

    }
}
