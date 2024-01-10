<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Models\Student;
use App\Models\Exam;
use App\Models\ExamMark;
use App\Models\Section;

class ExamMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.exam-mark.manage',[
            'examMarks'=>ExamMark::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.exam-mark.create',[
            'exams'=>Exam::all(),
            'sections'=>Section::all(),
            'students'=>Student::all(),
            'academicClasses'=>AcademicClass::all(),
            
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
        ExamMark::saveData($request);
        return redirect()->route('exam_marks.index')->with('success','Exam Mark create successfully');
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
        return view('backend.exammanagement.exam-mark.create',[
            'exams'=>Exam::all(),
            'sections'=>Section::all(),
            'students'=>Student::all(),
            'academicClasses'=>AcademicClass::all(),
            'examMark' =>ExamMark::find($id),
            
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
        ExamMark::updateData($request,$id);
        return redirect()->route('exam_marks.index')->with('success','Exam Mark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examMark=ExamMark::find($id);
       
        $examMark->delete();
        return redirect()->route('exam_marks.index')->with('success','Exam Mark delete successfully');
    }
}
