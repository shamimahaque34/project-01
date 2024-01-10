<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\AcademicClass;
use App\Models\Question;
use App\Models\QuestionDifficultyLevel;
use App\Models\QuestionBankAnswerOption;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $question;
    public function index()
    {
        return view('backend.exammanagement.question.manage',[
            'questions'=>Question::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.question.create',[
            'difficultys'=>QuestionDifficultyLevel::all(),
            'academicClasses'=>AcademicClass::all(),
            'subjects'=>Subject::all(),
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
//        $validetor=$request->validated();
//        if ($validetor->fails()){
//            return 'hello world';
//        }
        $this->question = Question::saveData($request);
        // QuestionBankAnswerOption::saveData($request ,$this->question);
        return redirect()->route('question.index')->with('success','Question  create successfully');

        // foreach($request->option_name as $key=>$value)
        // {
        //     $ans = new Ans();
        //     $ans->optin_name = $value;
        //     $ans->is_correct = $request->is_correct[$key];
        //     $ans->save();
        // }

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
        return view('backend.exammanagement.question.create',[
            'difficultys'=>QuestionDifficultyLevel::all(),
            'academicClasses'=>AcademicClass::all(),
            'subjects'=>Subject::all(),
            'question'=>Question::where('slug',$slug)->first(),
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
        Question::updateData($request,$id);
        return redirect()->route('question.index')->with('success','Question updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $question=Question::where('slug',$slug)->first();
        if(file_exists($question->question_img)){
            unlink($question->question_img);
        }
        $question->delete();
        return redirect()->route('question.index')->with('success','Question delete successfully');
    }
}
