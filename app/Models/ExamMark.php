<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamMark extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'section_id',
        'exam_id',
        'student_id',
        'academic_class_id',
        'mark',
    ];

    protected static $examMark;
    public static function updateData($request,$id){
        self::$examMark=ExamMark::find($id);
        self::insertData($request,self::$examMark);
    }

    public static function saveData($request){
        self::$examMark=new ExamMark();
        self::insertData($request);
    }

    public static function insertData($request,$examMark=null){
        self::$examMark->section_id        = $request->section_id;
        self::$examMark->exam_id           = $request->exam_id;
        self::$examMark->student_id        = $request->student_id;
        self::$examMark->academic_class_id = $request->academic_class_id;
        self::$examMark->mark              = $request->mark;
        self::$examMark->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'exam_marks';

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
