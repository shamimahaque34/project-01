<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
// use App\Models\Academic_Class;
// use App\Models\Academic_Subject;
use App\Models\AcademicClass;
use App\Models\StudentGroup;
use App\Models\EducationalStage;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.subject.manage',[
            'subjects'=>Subject::all(),
            'academicClasses'=>AcademicClass::all(),
            'studentGroups'=>StudentGroup::all(),
            'educationalStages'=>EducationalStage::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.subject.create',[
            'academicClasses'=>AcademicClass::all(),
            'studentGroups'=>StudentGroup::all(),
            'educationalStages'=>EducationalStage::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        Subject::saveData($request);
        return redirect()->route('subjects.index')->with('success','Subject Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('backend.academic.subject.details',[
            'subject'=>Subject::where('slug',$slug)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('backend.academic.subject.create',[
            'academicClasses'=>AcademicClass::all(),
            'studentGroups'=>StudentGroup::all(),
            'educationalStages'=>EducationalStage::all(),
            'subject'=>Subject::where('slug',$slug)->first(),
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
        Subject::updateData($request,$id);
        return redirect()->route('subjects.index')->with('success','Subject Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $subject=Subject::where('slug',$slug)->first();
        if (file_exists($subject->Subject_book_image)){
            unlink($subject->Subject_book_image);
        }
        $subject->delete();
        return redirect()->route('subjects.index')->with('success','Subject Delete successfully');
    }
}
