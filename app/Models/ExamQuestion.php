<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamQuestion extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'academic_class_id',
        'section_id',
        'student_group_id',
        'subject_id',
        'exam_id',
        'academic_year_id',
        'parent_id',
    ];

    protected static $examQuestion;
    public static function updateData($request,$id){
        self::$examQuestion=ExamQuestion::find($id);
        self::insertData($request,self::$examQuestion);
    }

    public static function saveData($request){
        self::$examQuestion=new examQuestion();
        self::insertData($request);
    }

    public static function insertData($request,$examQuestion=null){
        self::$examQuestion->section_id        = $request->section_id;
        self::$examQuestion->subject_id        = $request->subject_id;
        self::$examQuestion->exam_id           = $request->exam_id;
        self::$examQuestion->student_group_id  = $request->student_group_id;
        self::$examQuestion->academic_class_id = $request->academic_class_id;
        self::$examQuestion->academic_year_id  = $request->academic_year_id;
        self::$examQuestion->parent_id         = $request->parent_id;
        self::$examQuestion->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'exam_questions';

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function associateExamQuestions()
    {
        return $this->hasMany(AssociateExamQuestion::class);
    }
}
