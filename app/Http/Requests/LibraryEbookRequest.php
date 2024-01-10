<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryEbookRequest extends FormRequest
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
            'library_book_category_id'             => 'required',
        //    'academic_class_id'                    => 'required',
            'name'                                 => 'required',
            'author_name'                          => 'required',
            'book_code'                            => 'required',
            'price'                                => 'required',
            'cover_image'                          => 'required',
            // 'status'                               => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'library_book_category_id.required'           => 'Select a Library Book Category',
//            'academic_class_id.required'                  => 'Select a Academic class required',
            'name.required'                               => ' Name required ',
            'author_name.required'                        => 'Author Name required ',
            'book_code.required'                          => 'Book Code required',
            'price.required'                              => 'Price required',
            'cover_image.required'                        => 'Cover Image required',
            // 'status.required'                             => 'select a Status ',
        ];
    }
}
