<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicYearRequest extends FormRequest
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

            'session_year_start'  => 'required',
            'session_year_end'    => 'required',
            'session_month_start' => 'required',
            'session_month_end'   => 'required',
            'slug'                => 'required',
            // 'status'              => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'session_year_start.required'  => 'Session Year Start Required',
            'session_year_end.required'    => 'Session Year End Required',
            'session_month_start.required' => 'Session Month Start Required',
            'session_month_end.required'   => 'Session Month End Required',
            'slug.required'                => 'Slug Required',
            // 'status.numeric'               => 'select a Status ',
        ];
    }
}
