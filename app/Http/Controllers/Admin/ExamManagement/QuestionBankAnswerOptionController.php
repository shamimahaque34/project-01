<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionBankAnswerOption;


class QuestionBankAnswerOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected static $questionBankAnswerOption;
    protected static $question;
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        return $request->all();
        
        foreach($request->option_name as $key=>$value)
        {
           
           self::$questionBankAnswerOption = new QuestionBankAnswerOption();
           self::$questionBankAnswerOption->question_id =  $request->question_id;
           self::$questionBankAnswerOption->option_name = $value;
           self::$questionBankAnswerOption->full_ans = $request->full_ans;
           self::$questionBankAnswerOption->is_correct =$request->is_correct[$key];
           self::$questionBankAnswerOption->option_img = isset( $questionBankAnswerOption)? saveImage( $request->file('option_img[$key]'),'./backend/assets/image/OptionImages/', 'option_img ', self::$questionBankAnswerOption->option_img[]) : saveImage( $request->file('option_img[$key]'),
                './backend/assets/image/OptionImages/',
                'option_img ',
                ''
            );
            self::$questionBankAnswerOption->save();

            self::$question = Question::find($request->question_id);
            self::$question->question_answer_type = $request->question_answer_type;
            self::$question->total_options = $request->total_options;
            self::$question->update();

            return redirect()->route('question.index')->with('success','Question  Update successfully');

           
            }

           
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
