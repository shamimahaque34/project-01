<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'teacher_id'        => 'required',
            'class_schedule_id' => 'required',
            'section_id'        => 'required',
            'subject_id'        => 'required',
            'academic_year_id'  => 'required',
            'academic_class_id' => 'required',
            'day'               => 'required',
            'room'              => 'required',
            'note'              => 'required',
            // 'status'            => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'teacher_id.required'        => 'Teacher Id Required',
            'class_schedule_id.required' => 'Class Schedule Id Required',
            'section_id.required'        => 'Section Id Required',
            'subject_id.required'        => 'Subject Id Required',
            'academic_year_id.required'  => 'Academic Year Id Required',
            'academic_class_id.required' => 'Academic Class Id Required',
            'day.required'               => 'Day Required',
            'room.required'              => 'Room Required',
            'note.required'              => 'Note Required',
            // 'status.numeric'             => 'select a Status ',
        ];
    }
}
