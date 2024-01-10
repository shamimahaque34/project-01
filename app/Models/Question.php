<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'academic_class_id',
        'subject_id',
        'question_difficulty_level_id',
        'question',
        'explanation',
        'question_img',
        'mark',
        'hints',
        'question_answer_type',
        'total_options',
        'slug',
        'status',
    ];

    protected static $question;

    public static function updateData($request,$id){
        self::$question=Question::find($id);
        self::insertData($request,self::$question);
    }

    public static function saveData($request){
        self::$question=new Question();
        self::insertData($request,self::$question);
        return self::$question;

    }

    public static function insertData($request,$question=null){
        self::$question->academic_class_id            = $request->academic_class_id;
        self::$question->subject_id                   = $request->subject_id;
        self::$question->question_difficulty_level_id = $request->question_difficulty_level_id;
        self::$question->question                     = $request->question;
        self::$question->explanation                  = $request->explanation;
        self::$question->question_img                 =  isset($question) ? saveImage($request->file('question_img'),'./backend/assets/image/questionImages/','question_img ',self::$question->question_img ) : saveImage($request->file('question_img'),'./backend/assets/image/QuestionImages/','question_img ','',) ;
        self::$question->mark                         = $request->mark;
        self::$question->hints                        = $request->hints;
        self::$question->question_answer_type         = $request->question_answer_type;
        self::$question->total_options                = $request->total_options;
        self::$question->slug                         = str_replace('','-',$request->question);
        self::$question->status                       = $request->status == 'on' ? 1 : 0;
        self::$question->save();
       
    }


    protected $searchableFields = ['*'];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questionDifficultyLevel()
    {
        return $this->belongsTo(QuestionDifficultyLevel::class);
    }

    public function questionBankAnswerOptions()
    {
        return $this->hasMany(QuestionBankAnswerOption::class);
    }

    public function associateExamQuestions()
    {
        return $this->hasMany(AssociateExamQuestion::class);
    }
}
