<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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


            'educational_stage_id'             => 'required',
            'updated_by'                       => 'required',
            'student_group_id'                 => 'required',
            'academic_class_id'                => 'required',
            'Subject_name'                     => 'required',
            'subject_type__optional_mandatory' => 'required',
            'pass_mark'                        => 'required',
            'final_mark'                       => 'required',
            'point'                            => 'required',
            'Subject_author'                   => 'required',
            'Subject_code'                     => 'required',
            'Subject_book_image'               => 'required',
            'Is_for_graduation'                => 'required',
            'is_main_subject'                  => 'required',
            'Is_optional'                      => 'required',
            'note'                             => 'required',
            'slug'                             => 'required',
            // 'status'                           => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'educational_stage_id.required'             => 'educational Stage Id Required',
            'updated_by.required'                       => 'Updated By Required',
            'student_group_id.required'                 => 'Student group Id Required',
            'academic_class_id.required'                => 'Academic Class Id Required',
            'Subject_name.required'                     => 'Subject Name Required',
            'subject_type__optional_mandatory.required' => 'Subject Type Optional Required',
            'pass_mark.required'                        => 'Pass Mark Required',
            'final_mark.required'                       => 'Final Mark Required',
            'point.required'                            => 'Point Required',
            'Subject_author.required'                   => 'Subject Author Required',
            'Subject_code.required'                     => 'Subject Code Required',
            'Subject_book_image.required'               => 'Subject Book Image Required',
            'Is_for_graduation.required'                => 'Is For Graduation Required',
            'is_main_subject.required'                  => 'Is Main Subject Required',
            'Is_optional.required'                      => 'Is Optional Required',
            'note.required'                             => 'Note Required',
            'slug.required'                             => 'Slug Required',
            // 'status.numeric'                            => 'select a Status ',
        ];
    }
}
