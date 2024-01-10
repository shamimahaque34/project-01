<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamGradeRequest extends FormRequest
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
            'grade_name'                   =>'required',
            'point'                        =>'required|numeric',
            'mark_form'                    =>'required|numeric',
            'mark_to'                      =>'required|numeric',
            'note'                         =>'required',
            // 'status'                       =>'required',
        ];
    }
    public function messages()
    {
        return [
            'grade_name.required'                      =>'Grade Name required',
            'point.required'                           =>'Point required',
            'mark_form.required'                       =>'Mark Form required',
            'mark_to.required'                         =>'Mark To required',
            'note.required'                            =>'Note required',
            // 'status.required'                          =>'Select a Status',
        ];
    }
}
