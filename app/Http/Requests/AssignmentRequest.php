<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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

            'subject_id'         => 'required',
            'academic_class_id'  => 'required',
            'section_id'         => 'required',
            'title'              => 'required',
            'description'        => 'required',
            'deadline'           => 'required',
            'deadline_timestamp' => 'required',
            'file'               => 'required',
            'note'               => 'required',
            'slug'               => 'required',
            // 'status'             => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'subject_id.required'         => 'Subject Id Required',
            'academic_class_id.required'  => 'Academic Class Id Required',
            'section_id.required'         => 'Section Id Required',
            'title.required'              => 'Title Required',
            'description.required'        => 'Description Required',
            'deadline.required'           => 'Deadline Required',
            'deadline_timestamp.required' => 'Deadline TimeStamp Required',
            'file.required'               => 'File Required',
            'note.required'               => 'Note Required',
            'slug.required'               => 'Slug Required',
            // 'status.numeric'              => 'select a Status ',
        ];
    }
}
