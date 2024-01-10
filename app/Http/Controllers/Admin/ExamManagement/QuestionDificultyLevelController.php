<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionDifficultylevelRequest;
use App\Models\QuestionDifficultyLevel;
use Illuminate\Http\Request;

class QuestionDificultyLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.question-dificulty-level.manage',[
            'difficultys'=>QuestionDifficultyLevel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.question-dificulty-level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionDifficultylevelRequest $request)
    {
        QuestionDifficultyLevel::saveData($request);
        return redirect()->route('question_difficulty_level.index')->with('success','Question Difficulty Level create successfully');
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
        return view('backend.exammanagement.question-dificulty-level.create',[
            'questionDificulty'=>QuestionDifficultyLevel::where('slug',$slug)->first(),
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
        QuestionDifficultyLevel::updateData($request,$id);
        return redirect()->route('question_difficulty_level.index')->with('success','Question Difficulty Level Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $difficulty=QuestionDifficultyLevel::where('slug',$slug)->first();
        $difficulty->delete();
        return redirect()->route('question_difficulty_level.index')->with('success','Question Difficulty Level delete successfully');
    }
}
