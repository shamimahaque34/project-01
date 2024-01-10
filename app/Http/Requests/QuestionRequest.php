<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'academic_class_id'                     =>'required',
            'subject_id'                            =>'required',
            'question_difficulty_level_id'          =>'required',
            'question'                              =>'required',
            'explanation'                           =>'required',
            'question_img'                          =>'required',
            'mark'                                  =>'required',
            'hints'                                 =>'required',
            'question_answer_type'                  =>'required|numeric',
            'total_options'                         =>'required|numeric',
            // 'status'                                =>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'academic_class_id.required'                =>'Select a Academic Class ',
            'subject_id.required'                       =>'Select a Subject',
            'question_difficulty_level_id.required'     =>'Select a Question Difficulty level ',
            'question.required'                         =>'Question required',
            'explanation.required'                      =>'Explanation required',
            'question_img.required'                     =>'Question Image required',
            'mark.required'                             =>'Mark required',
            'hints.required'                            =>'Hints required',
            'question_answer_type.required'             =>'Question Answer Type required',
            'total_options.required'                    =>'Total Options required',
            // 'status.required'                           =>'Select a Status',
        ];
    }
}
