<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostelRequest extends FormRequest
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
            'hostel_name'          =>'required',
            'hostel_type'          =>'required',
            'address'              =>'required',
            'fee'                  =>'required|numeric',
            'class_type'           =>'required',
            'total_floor'          =>'required|numeric',
            'total_rooms'          =>'required|numeric',
            'seat_per_room'        =>'required|numeric',
            'note'                 =>'required',
            // 'status'               =>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'hostel_name.required'              =>'Hostel Name required',
            'hostel_type.required'              =>'Hostel Type required',
            'address.required'                  =>'Address required',
            'fee.required'                      =>'Fee required',
            'class_type.required'               =>'Class Type required',
            'total_floor.required'              =>'Total Floor required',
            'total_rooms.required'              =>'Total Rooms required',
            'seat_per_room.required'            =>'Seat Per Room required',
            'note.required'                     =>'Note Required',
            // 'status.required'                   =>'Select a Status',
        ];
    }
}
