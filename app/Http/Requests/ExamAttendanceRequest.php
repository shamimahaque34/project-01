<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamAttendanceRequest extends FormRequest
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
            'exam_id'                   =>'required',
            'exam_schedule_id'          =>'required',
            'student_id'                =>'required',
            'section_id'                =>'required',
            'academic_class_id'         =>'required',
            'date'                      =>'required',
        ];
    }
    public function messages()
    {
        return [
            'exam_id.required'                      =>'Exam Name required',
            'exam_schedule_id.required'             =>'Exam Schedule required',
            'student_id.required'                   =>'Student Name required',
            'section_id.required'                   =>'Section required',
            'academic_class_id.required'            =>'Academic Class required',
            'date.required'                         =>'Date required',
        ];
    }
}
