<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamAttendance extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'exam_id',
        'exam_schedule_id',
        'student_id',
        'section_id',
        'academic_class_id',
        'date',
        'is_present',
    ];

    protected static $attendance;

    public static function updateData($request,$id){
        self::$attendance=ExamAttendance::find($id);
        self::insertData($request,self::$attendance);
    }

    public static function saveData($request){
        self::$attendance=new ExamAttendance();
        self::insertData($request);
    }

    public static function insertData($request,$attendance=null){
        self::$attendance-> exam_id                              =$request->exam_id;
        self::$attendance-> exam_schedule_id                     =$request->exam_schedule_id;
        self::$attendance-> student_id                           =$request->student_id;
        self::$attendance-> section_id                           =$request->section_id;
        self::$attendance-> academic_class_id                    =$request->academic_class_id;
        self::$attendance-> date                                 =$request->date;
        self::$attendance->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'exam_attendances';

    protected $casts = [
        'date' => 'date',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function examSchedule()
    {
        return $this->belongsTo(ExamSchedule::class);
    }


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
