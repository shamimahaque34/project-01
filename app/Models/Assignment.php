<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'subject_id',
        'academic_class_id',
        'section_id',
        'title',
        'description',
        'deadline',
        'deadline_timestamp',
        'file',
        'file_type',
        'note',
        'slug',
        'status',
    ];


    protected static $assignment;

    public static function updateData($request, $id)
    {
        self::$assignment = Assignment::find($id);
        self::insertData($request, self::$assignment);
    }

    public static function saveData($request)
    {
        self::$assignment = new Assignment();
        self::insertData($request);
    }

    public static function insertData($request, $assignment = null)
    {
        self::$assignment->subject_id         = $request->subject_id;
        self::$assignment->academic_class_id  = $request->academic_class_id;
        self::$assignment->section_id         = $request->section_id;
        self::$assignment->title              = $request->title;
        self::$assignment->description        = $request->description;
        self::$assignment->deadline           = $request->deadline;
        self::$assignment->deadline_timestamp = \Carbon\Carbon::parse($request->deadline)->timestamp;
        self::$assignment->file               = isset($assignment) ? saveImage($request->file('file'),'./backend/assets/file/assignmentFiles/','file',self::$assignment->file,) : saveImage($request->file('file'),'./backend/assets/file/assignmentFiles/','file','',);
        self::$assignment->file_type            = $request->file('file')->getClientOriginalExtension();
        self::$assignment->note               = $request->note;
        self::$assignment->status             = $request->status == 'on' ? 1 : 0;
        self::$assignment->slug               = str_replace(' ', '-', $request->title);
        self::$assignment->save();
    }


    protected $searchableFields = ['*'];

    protected $casts = [
        'deadline_timestamp' => 'datetime',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
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
