<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryMemberRequest extends FormRequest
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
            'library_id'       =>'required',
            'user_id'          =>'required',
            'name'             =>'required',
            'email'            =>'required|email',
            'phone'            =>'required',
        ];
    }
    public function messages()
    {
        return [
            'library_id.required'           =>'Library required',
            'user_id.required'              =>'User naem required',
            'name.required'                 =>'Name required ',
            'email.required'                =>'Email required',
            'phone.required'                =>'Phone required',
        ];
    }
}
