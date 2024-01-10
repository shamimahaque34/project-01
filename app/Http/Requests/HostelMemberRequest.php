<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostelMemberRequest extends FormRequest
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
            'user_id'          =>'required',
            'student_id'       =>'required',
            'teacher_id'       =>'required',
            'hostel_id'        =>'required',
            'bostel_balance'    =>'required|numeric',
            'jod'              =>'required',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required'              =>'User Name required',
            'student_id.required'           =>'Student name required',
            'teacher_id.required'           =>'Teacher Name required',
            'hostel_id.required'            =>'Hostel id required',
            'bostel_balance.required'       =>'Hostel Balance required',
            'jod.required'                  =>'job required',
        ];
    }
}
