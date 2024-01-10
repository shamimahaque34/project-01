<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuranFontRequest extends FormRequest
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
            'quran_font' => 'required',
            // 'status'  => 'required|numeric',
        ];
    }


    public function messages()
    {
        return [
            'quran_font.required' => 'Quran Font required',
            // 'status.required'  => 'select a Status ',
        ];
    }
}
