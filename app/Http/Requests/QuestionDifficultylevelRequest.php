<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionDifficultylevelRequest extends FormRequest
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
            'title'       => 'required',
            // 'status'       => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'           =>'Title required',
            // 'status.required'                  =>'Select a Status',
        ];
    }
}
