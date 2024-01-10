<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryBookRequest;
use App\Models\LibraryBook;
use App\Models\LibraryBookCategory;
use Illuminate\Http\Request;

class LibraryBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.library.book.manage',[
            'books'=>LibraryBook::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.library.book.create',[
            'librarybookcategorys'=>LibraryBookCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryBookRequest $request)
    {
        LibraryBook::saveData($request);
        return redirect()->route('library_book.index')->with('success','book inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('backend.library.book.create',[
            'librarybookcategorys'=>LibraryBookCategory::all(),
            'libraryBook'=>LibraryBook::where('slug',$slug)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        LibraryBook::updateData($request,$id);
        return redirect()->route('library_book.index')->with('success','book update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $books=LibraryBook::where('slug',$slug)->first();
        if(file_exists($books->cover_image)){
            unlink($books->cover_image);
        }
        $books->delete();
        return redirect()->route('library_book.index')->with('success','book delete successfully');
    }
}
