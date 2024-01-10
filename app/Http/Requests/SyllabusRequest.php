<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SyllabusRequest extends FormRequest
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
            'subject_id'       => 'required',
            'academic_year_id' => 'required',
            'title'            => 'required',
            'description'      => 'required',
            'file'             => 'required',
            'file_type'        => 'required',
            'note'             => 'required',
            'slug'             => 'required',
            // 'status'           => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'subject_id.required'       => 'Subject Id Required',
            'academic_year_id.required' => 'Academic Year Id Required',
            'title.required'            => 'Title Required',
            'description.required'      => 'Description Required',
            'file.required'             => 'File Required',
            'file_type.required'        => 'File Type Required',
            'note.required'             => 'Note Required',
            'slug.required'             => 'Slug Required',
            // 'status.numeric'            => 'select a Status ',
        ];
    }
}
