<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentGroup extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = 
    [
        'group_name', 
        'note', 
        'slug', 
        'status'
    ];

    protected static $studentGroup;

    public static function updateData($request, $id)
    {
        self::$studentGroup = StudentGroup::find($id);
        self::insertData($request, self::$studentGroup);
    }

    public static function saveData($request)
    {
        self::$studentGroup = new studentGroup();
        self::insertData($request);
    }

    public static function insertData($request, $studentGroup = null)
    {
        self::$studentGroup->group_name = $request->group_name;
        self::$studentGroup->note       = $request->note;
        self::$studentGroup->status     = $request->status == 'on' ? 1 : 0;
        self::$studentGroup->slug       = str_replace(' ', '-', $request->group_name);
        self::$studentGroup->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'student_groups';

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class);
    }
}
