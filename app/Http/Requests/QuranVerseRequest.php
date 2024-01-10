<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuranVerseRequest extends FormRequest
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
            
            'quran_chapter_id' => 'required',
            'quran_font_id'    => 'required',
            'audio'            => 'required',
            'verse_arabic'     => 'required',
            'verse_bangla'     => 'required',
            'verse_english'    => 'required',
            // 'status'           => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            
            'quran_chapter_id.required' => 'Select a Quran Chapter',
            'quran_font_id.required'    => 'Select a Quran Font',
            'audio.required'            => 'Audio required ',
            'verse_arabic.required'     => 'Verse Arabic required',
            'verse_bangla.required'     => 'Verse Bangla required',
            'verse_english.required'    => 'verse English required',
            // 'status.required' => 'select a Status ',
        ];
    }
}
