<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamMarkDistributionRequest extends FormRequest
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
            'distribution_type'                   =>'required',
            'mark_value'                          =>'required|numeric',
            // 'status'                              =>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'distribution_type.required'                      =>'Distribution Type required',
            'mark_value.required'                             =>'Mark Value required',
            // 'status.required'                                 =>'Select a Status',
        ];
    }
}
