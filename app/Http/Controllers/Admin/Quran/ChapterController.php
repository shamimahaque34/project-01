<?php

namespace App\Http\Controllers\Admin\Quran;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuranChapterRequest;
use App\Models\QuranChapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {

         return json_encode(QuranChapter::latest()->get());
        } else {
            return view('backend.quran.chapter.manage',[
                'chapters' => QuranChapter::all(),
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('backend.quran.chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ QuranChapterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuranChapterRequest $request)
    {
      QuranChapter::saveData($request);

        // return redirect()->route('chapters.index')->with('success','Chapter Create Succesfully');
        return response()->json(
            ['success' => 'Chapter created successfully'],200);
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
        $this->chapter = QuranChapter::where('id', $id)->first();
        if(request()->ajax())
        {
            return response()->json([
                'success'=>true,
                'chapter'=>$this->chapter,
    
            ]);
        } else {
            // return view()
        }
        
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
        QuranChapter::updateData($request,$id);
        // return redirect()->route('chapters.index')->with('success','Chapter Update Succesfully');
        return response()->json(
            ['success' => 'Chapter updated successfully'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quranChapter = QuranChapter::where('id',$id)->first();
        if($quranChapter){
        $quranChapter->delete();
        return response()->json(['success'=>'Chapter deleted successfully.'], 200);
       
        }


    }
}
