<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryEbookFileRequest;
use App\Models\LibraryEbook;
use App\Models\LibraryEbookFile;
use Illuminate\Http\Request;

class LibraryEbookFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.library.ebookfile.manage',[
            'ebookfiles'=>LibraryEbookFile::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.library.ebookfile.create',[
            'ebooks'=>LibraryEbook::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryEbookFileRequest $request)
    {
        LibraryEbookFile::saveData($request);
        return redirect()->route('library_ebook_file.index')->with('success','Ebook File Uploaded Successfully');
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
    public function edit($id)
    {
        return view('backend.library.ebookfile.create',[
            'ebooks'=>LibraryEbook::all(),
            'ebookfile'=>LibraryEbookFile::find($id),
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
        LibraryEbookFile::updateData($request,$id);
        return redirect()->route('library_ebook_file.index')->with('success','Ebook File updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=LibraryEbookFile::find($id);
        if (file_exists($file->file_name)){
            unlink($file->file_name);
        }
        $file->delete();
        return redirect()->route('library_ebook_file.index')->with('success','Ebook File delete Successfully');
    }
}
