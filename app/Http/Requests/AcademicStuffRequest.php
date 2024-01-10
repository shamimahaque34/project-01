<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicStuffRequest extends FormRequest
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
            'username'                   =>'required',
            'name_english'               =>'required',
            'name_bangla'                =>'required',
            'email'                      =>'required',
            'phone'                      =>'required',
            'designation_id'             =>'required',
            'dob'                        =>'required',
            'dob_timestamp'              =>'required',
            'gender'                     =>'required',
            'religion'                   =>'required',
            'jod'                        =>'required',
            'jod_timestamp'              =>'required',
            'image'                      =>'required',
            'address'                    =>'required',
            'highest_education'          =>'required',
            'slug'                       =>'required',
            'status'                     =>'required',
               ];
    }
    public function messages()
    {
        return [
            'username.required'                      =>'User Name required',
            'name_english.required'                  =>'English Name required',
            'name_bangla.required'                   =>'Bangla Name required',
            'email.required'                         =>'Email required',
            'phone.required'                         =>'Phone required',
            'designation_id.required'                =>'Designation required',
            'dob.required'                           =>'Dob required',
            'dob_timestamp.required'                 =>'Time required',
            'gender.required'                        =>'Gender required',
            'religion.required'                      =>'Religion required',
            'jod.required'                           =>'Jod required',
            'jod_timestamp.required'                 =>'Time required',
            'image.required'                         =>'Image required',
            'address.required'                       =>'Addressrequired',
            'highest_education.required'             =>'Education required',
            'status.required'                        =>'Exam Name required',
            ];
    }
}
