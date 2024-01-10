<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassScheduleRequest extends FormRequest
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

            'starting_time'           => 'required',
            'starting_time_timestamp' => 'required',
            'ending_time'             => 'required',
            'ending_time_timestamp'   => 'required',
            'slug'                    => 'required',
            // 'status'                  => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'starting_time.required'           => 'Starting Time Required',
            'starting_time_timestamp.required' => 'Starting Time TimeStamp Required',
            'ending_time.required'             => 'Ending Time Required',
            'ending_time_timestamp.required'   => 'Ending Time TimeStamp Required',
            'slug.required'                    => 'Slug Required',
            // 'status.numeric'                   => 'select a Status ',
        ];
    }
}
