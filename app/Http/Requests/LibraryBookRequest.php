<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryBookRequest extends FormRequest
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
            'name'                                 => 'required',
            'author_name'                          => 'required',
            'publisher_name'                       => 'required',
            'book_code'                            => 'required',
            'price'                                => 'required',
            'quantity'                             => 'required',
            'due_quantity'                         => 'required',
            'cover_image'                          => 'required',
            'self_no'                              => 'required',
            // 'status'                               => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'library_book_category_id.required'           => 'Select a Library Book Category',
            'name.required'                               => 'Book Name required',
            'author_name.required'                        => 'Author Name required ',
            'publisher_name.required'                     => 'Publisher Name required',
            'book_code.required'                          => 'Book Code required',
            'price.required'                              => 'Price required',
            'quantity.required'                           => 'Quantity required',
            'due_quantity.required'                       => 'Due Quantity required',
            'cover_image.required'                        => 'Cover Image required',
            'self_no.required'                            => 'Self Number required',
            // 'status.required'                             => 'select a Status ',
        ];
    }
}
