<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicClassRequest extends FormRequest
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

            'educational_stage_id'  => 'required',
            'class_name'            => 'required',
            'class_numeric'         => 'required',
            'note'                  => 'required',
            'slug'                  => 'required',
            // 'status'                => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'educational_stage_id.required' => 'Educational Stage Id Required',
            'class_name.required'           => 'Class Name Required',
            'class_numeric.required'        => 'Class Numeric Required',
            'note.required'                 => 'Note Required',
            'slug.required'                 => 'Slug Required',
            // 'status.numeric'                => 'Select a Status ',
        ];
    }
}
