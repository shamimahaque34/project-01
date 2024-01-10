<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Models\StudentGroup;
use App\Models\AcademicYear;
// use App\Models\StudentParent;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\Section;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.exam-question.manage',[
            'examQuestions'=>ExamQuestion::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.exam-question.create',[
            'exams'=>Exam::all(),
            'subjects'=>Subject::all(),
            'sections'=>Section::all(),
            // 'studentParents'=>StudentParent::all(),
            'academicClasses'=>AcademicClass::all(),
            'academicYears'=>AcademicYear::all(),
            'studentGroups'=>StudentGroup::all(),
            
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
        ExamQuestion::saveData($request);
        return redirect()->route('exam_questions.index')->with('success','Exam Question create successfully');
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
        return view('backend.exammanagement.exam-question.create',[
            'exams'=>Exam::all(),
            'subjects'=>Subject::all(),
            'sections'=>Section::all(),
            // 'studentParents'=>StudentParent::all(),
            'academicClasses'=>AcademicClass::all(),
            'academicYears'=>AcademicYear::all(),
            'studentGroups'=>StudentGroup::all(),
            'examQuestion' =>ExamQuestion::find($id),
            
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
        ExamQuestion::updateData($request,$id);
        return redirect()->route('exam_questions.index')->with('success','Exam Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examQuestion=ExamQuestion::find($id);
       
        $examQuestion->delete();
        return redirect()->route('exam_questions.index')->with('success','Exam Question delete successfully');
    }
}
