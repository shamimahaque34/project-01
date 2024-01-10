<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryEbookRequest;
use App\Models\LibraryBookCategory;
use App\Models\LibraryEbook;
use App\Models\AcademicClass;
use Illuminate\Http\Request;

class LibraryEbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.library.ebook.manage',[
            'ebooks'=>LibraryEbook::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.library.ebook.create',[
            'librarycategoryes'=>LibraryBookCategory::all(),
            'academicClasses'=>AcademicClass::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryEbookRequest $request)
    {
        LibraryEbook::saveData($request);
        return redirect()->route('library_ebook.index')->with('success','Ebook add Successfully');
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
        return view('backend.library.ebook.create',[
            'librarycategoryes'=>LibraryBookCategory::all(),
            'academicClasses'=>AcademicClass::all(),
            'ebook'=>LibraryEbook::where('slug',$slug)->first(),
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
        LibraryEbook::updateData($request,$id);
        return redirect()->route('library_ebook.index')->with('success','Ebook update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ebook=LibraryEbook::where('slug',$slug)->first();
        if (file_exists($ebook->cover_image)){
            unlink($ebook->cover_image);
        }
        $ebook->delete();
        return redirect()->route('library_ebook.index')->with('success','Ebook delete Successfully');
    }
}
