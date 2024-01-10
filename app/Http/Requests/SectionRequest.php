<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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

            'section_name'     => 'required',
            'section_capacity' => 'required',
            'section_note'     => 'required',
            // 'status'           => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'section_name.required'     => 'Section Name Required',
            'section_capacity.required' => 'Section Capacity Required',
            'section_note.required'     => 'Section Note Required',
            // 'status.numeric'            => 'select a Status ',
        ];
    }
}
