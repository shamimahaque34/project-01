<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryBookCategoryRequest;
use App\Models\LibraryBookCategory;
use Illuminate\Http\Request;

class LibraryBookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.library.category.manage',[
            'bookcategorys'=>LibraryBookCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.library.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryBookCategoryRequest $request)
    {
        LibraryBookCategory::saveData($request);
        return redirect()->route('library_book_category.index')->with('success','Book Category Create Successfully');
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
        return view('backend.library.category.create',[
            'libraryCategory'=>LibraryBookCategory::where('slug',$slug)->first(),
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
        LibraryBookCategory::updateData($request,$id);
        return redirect()->route('library_book_category.index')->with('success','Book Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category=LibraryBookCategory::where('slug',$slug)->first();
        $category->delete();
        return redirect()->route('library_book_category.index')->with('success','Book Category Delete Successfully');
    }
}
