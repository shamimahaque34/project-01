<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssociateExamQuestion extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['exam_question_id', 'question_id'];


    protected static $associateExamQuestion;
    public static function updateData($request,$id){
        self::$associateExamQuestion = AssociateExamQuestion::find($id);
        self::insertData($request,self::$associateExamQuestion);
    }

    public static function saveData($request){
        self::$associateExamQuestion = new AssociateExamQuestion();
        self::insertData($request);
    }

    public static function insertData($request,$associateExamQuestion=null){
        self::$associateExamQuestion->exam_question_id = $request->exam_question_id;
        self::$associateExamQuestion->question_id      = $request->question_id;
        self::$associateExamQuestion->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'associate_exam_questions';

    public function examQuestion()
    {
        return $this->belongsTo(ExamQuestion::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
