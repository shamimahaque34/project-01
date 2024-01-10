<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Subject extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'educational_stage_id',
        'updated_by',
        'student_group_id',
        'academic_class_id',
        'Subject_name',
        'subject_type__optional_mandatory',
        'pass_mark',
        'final_mark',
        'point',
        'Subject_author',
        'Subject_code',
        'Subject_book_image',
        'Is_for_graduation',
        'is_main_subject',
        'Is_optional',
        'note',
        'slug',
        'status',
    ];

    protected static $subject;

    public static function updateData($request, $id)
    {
        self::$subject = Subject::find($id);
        self::insertData($request, self::$subject);
    }

    public static function saveData($request)
    {
        self::$subject = new Subject();
        self::insertData($request);
    }

    public static function insertData($request, $subject = null)
    {  
        self::$subject->educational_stage_id = $request->educational_stage_id;
        self::$subject->updated_by           = Auth::id();
        self::$subject->student_group_id     = $request->student_group_id;
        self::$subject->academic_class_id    = $request->academic_class_id;
        self::$subject->Subject_name         = $request->Subject_name;
        self::$subject->subject_type__optional_mandatory = $request->subject_type__optional_mandatory;
        self::$subject->pass_mark            = $request->pass_mark;
        self::$subject->final_mark           = $request->final_mark;
        self::$subject->point                = $request->point;
        self::$subject->Subject_author       = $request->Subject_author;
        self::$subject->Subject_code         = $request->Subject_code;
        self::$subject->Subject_book_image   = isset($subject) ? saveImage($request->file('Subject_book_image'),'./backend/assets/SubjectImages/','Subject_book_image',self::$subject->Subject_book_image,) : saveImage($request->file('Subject_book_image'),'./backend/assets/SubjectImages/','Subject_book_image','',) ;
        self::$subject->Is_for_graduation    = $request->Is_for_graduation == 'on' ? 1 : 0;
        self::$subject->is_main_subject      = $request->is_main_subject == 'on' ? 1 : 0;
        self::$subject->Is_optional          = $request->Is_optional == 'on' ? 1 : 0;
        self::$subject->note                 = $request->note;
        self::$subject->status               = $request->status == 'on' ? 1 : 0;
        self::$subject->slug                 = str_replace(' ', '-', $request->Subject_name);
        self::$subject->save();
    }


    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function educationalStage()
    {
        return $this->belongsTo(EducationalStage::class);
    }

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class);
    }

    public function student_main_subjects()
    {
        return $this->hasMany(Student::class, 'main_subject_id');
    }

    public function student_optional_subjects()
    {
        return $this->hasMany(Student::class, 'optional_subject_id');
    }

    public function routine()
    {
        return $this->hasOne(Routine::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function examSchedule()
    {
        return $this->hasOne(ExamSchedule::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function syllabus()
    {
        return $this->hasOne(Syllabus::class);
    }

    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
