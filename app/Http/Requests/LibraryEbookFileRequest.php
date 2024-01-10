<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryEbookFileRequest extends FormRequest
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
            'library_ebook_id' => 'required',
            'file_name'        => 'required',
        ];
    }
    public function messages()
    {
        return [
            'library_ebook_id.required' =>'Library Ebook required',
            'file_name.required'        =>'File required',
        ];
    }
}
