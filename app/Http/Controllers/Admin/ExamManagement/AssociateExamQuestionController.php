<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssociateExamQuestion;
use App\Models\ExamQuestion;
use App\Models\Question;

class AssociateExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.associate-exam-question.manage',[
            'associateExamQuestions'=>AssociateExamQuestion::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.exammanagement.associate-exam-question.create',[
            'questions'=>Question::all(),
            'examQuestions'=>ExamQuestion::all(),
            
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
        AssociateExamQuestion::saveData($request);
        return redirect()->route('associate_exam_questions.index')->with('success',' Associate Exam Question  create successfully');
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
        return view('backend.exammanagement.associate-exam-question.create',[
        'questions'=>Question::all(),
        'examQuestions'=>ExamQuestion::all(),
        'associateExamQuestion'=>AssociateExamQuestion::find($id),
        
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
        AssociateExamQuestion::updateData($request,$id);
        return redirect()->route('associate_exam_questions.index')->with('success',' associate Exam Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $associateExamQuestion = AssociateExamQuestion::find($id);
      
        $associateExamQuestion->delete();
        return redirect()->route('associate_exam_questions.index')->with('success',' Associate Exam Question delete successfully');
    }
}
