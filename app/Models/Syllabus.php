<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Syllabus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'subject_id',
        'academic_year_id',
        'title',
        'description',
        'file',
        'file_type',
        'note',
        'slug',
        'status',
    ];

    protected static $syllabus;

    public static function updateData($request, $id)
    {
        self::$syllabus = Syllabus::find($id);
        self::insertData($request, self::$syllabus);
    }

    public static function saveData($request)
    {
        self::$syllabus = new Syllabus();
        self::insertData($request);
    }

    public static function insertData($request, $syllabus = null)
    {
        self::$syllabus->subject_id       = $request->subject_id;
        self::$syllabus->academic_year_id = $request->academic_year_id;
        self::$syllabus->title            = $request->title;
        self::$syllabus->description      = $request->description;
        self::$syllabus->file             = isset($syllabus) ? saveImage($request->file('file'),'./backend/assets/file/syllabusFiles/','file',self::$syllabus->file,) : saveImage($request->file('file'),'./backend/assets/file/syllabusFiles/','file','',);
        self::$syllabus->file_type        = $request->file('file')->getClientOriginalExtension();
        self::$syllabus->note             = $request->note;
        self::$syllabus->status           = $request->status == 'on' ? 1 : 0;
        self::$syllabus->slug             = str_replace(' ', '-', $request->title);
        self::$syllabus->save();
    }

    protected $searchableFields = ['*'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
