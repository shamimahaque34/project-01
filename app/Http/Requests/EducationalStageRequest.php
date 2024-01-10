<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationalStageRequest extends FormRequest
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

            'group_name' => 'required', 
            'slug'       => 'required', 
            // 'status'     => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'group_name.required' => 'Group Name Required',
            'slug.required'       => 'Slug Required',
            // 'status.numeric'      => 'select a Status ',
        ];
    }
}
