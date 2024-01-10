<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HostelMember extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'student_id',
        'teacher_id',
        'hostel_id',
        'bostel_balance',
        'jod',
    ];

    protected static $member;

    public static function updateData($request,$id){
        self::$member=HostelMember::find($id);
        self::insertData($request,self::$member);
    }

    public static function saveData($request){
        self::$member=new HostelMember();
        self::insertData($request);
    }

    public static function insertData($request,$member=null){
        self::$member->user_id        = $request->user_id;
        self::$member->student_id     = $request->student_id;
        self::$member->teacher_id     = $request->teacher_id;
        self::$member->hostel_id      = $request->hostel_id;
        self::$member->bostel_balance = $request->bostel_balance;
        self::$member->jod            = $request->jod;
        self::$member->save();
    }


    protected $searchableFields = ['*'];

    protected $table = 'hostel_members';

    protected $casts = [
        'jod' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
