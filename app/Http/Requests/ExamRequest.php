<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'title'                   =>'required',
            'display_title'           =>'required',
            'exam_code'               =>'required',
            'date'                    =>'required',
            'note'                    =>'required',
            

        ];
    }
    public function messages()
    {
        return [
            'title.required'                      =>'Title required',
            'display_title.required'              =>'Display Title required',
            'exam_code.required'                  =>'Exam Code required',
            'date.required'                       =>'Date required',
            'note.required'                       =>'Note required',
            // 'status.required'                     =>'Select a Status ',
        ];
    }
}
