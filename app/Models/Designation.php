<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'title_bangla',
        'position_number',
        'slug',
        'status',
    ];

    protected static $designation;

    public static function saveData($request)
    {
       self::$designation = new Designation();
       Designation::insertData($request);
    }

    public static function updateData($request,$id)
    {
      self::$designation = Designation::find($id);
      Designation::insertData($request,self::$designation);
    }

    public static function insertData($request,$designation = null)
    {
        self::$designation->title           = $request->title;
        self::$designation->title_bangla    = $request->title_bangla;
        self::$designation->position_number = $request->position_number;
        self::$designation->slug            = str_replace(' ','-',$request->title);
        self::$designation->status          = $request->status;
        self::$designation->save();
    }

    protected $searchableFields = ['*'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function academicStuffs()
    {
        return $this->hasMany(AcademicStuff::class);
    }
}
