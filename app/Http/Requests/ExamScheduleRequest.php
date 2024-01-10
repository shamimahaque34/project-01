<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamScheduleRequest extends FormRequest
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
            'section_id'                =>'required',
            'subject_id'                =>'required',
            'academic_year_id'          =>'required',
            'academic_class_id'         =>'required',
            'exam_date'                 =>'required',
            'start_time'                =>'required',
            'end_time'                  =>'required',
            'note'                      =>'required',
            // 'status'                    =>'required',
        ];
    }
    public function messages()
    {
        return [
            'exam_id.required'                      =>'Exam Name required',
            'section_id.required'                   =>'Section Name required',
            'subject_id.required'                   =>'Subject Name required',
            'academic_year_id.required'             =>'Academic Year Name required',
            'academic_class_id.required'            =>'academic Class Name required',
            'exam_date.required'                    =>'Exam Date required',
            'start_time.required'                   =>'Start Time required',
            'end_time.required'                     =>'End Time required',
            'note.required'                         =>'Note Required',
            // 'status.required'                       =>'Select a Status',
        ];
    }
}
