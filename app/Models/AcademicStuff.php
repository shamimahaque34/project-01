<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class AcademicStuff extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'username',
        'name_english',
        'name_bangla',
        'email',
        'phone',
        'designation_id',
        'dob',
        'dob_timestamp',
        'gender',
        'religion',
        'jod',
        'jod_timestamp',
        'image',
        'address',
        'highest_education',
        'created_by',
        'slug',
        'status',
    ];


    protected static $academicStuff;

    public static function updateData($request,$id){
        self::$academicStuff=AcademicStuff::find($id);
        self::insertData($request,self::$academicStuff);
    }

    public static function saveData($request){
        self::$academicStuff=new AcademicStuff();
        self::insertData($request,self::$academicStuff);
    }

    public static function insertData($request,$academicStuff=null){
        self::$academicStuff->user_id                                   =Auth::id();
        self::$academicStuff->username                                  =$request->username;
        self::$academicStuff->name_english                              =$request->name_english;
        self::$academicStuff->name_bangla                               =$request->name_bangla;
        self::$academicStuff->email                                     =$request->email;
        self::$academicStuff->phone                                     =$request->phone;
        self::$academicStuff->designation_id                            =$request->designation_id;
        self::$academicStuff->dob                                       =$request->dob;
        self::$academicStuff->dob_timestamp                             =$request->dob_timestamp;
        self::$academicStuff->gender                                    =$request->gender;
        self::$academicStuff->religion                                  =$request->religion;
        self::$academicStuff->jod                                       =$request->jod;
        self::$academicStuff->jod_timestamp                             =$request->jod_timestamp;
        self::$academicStuff->image                                     =saveImage($request->file('image'),'backend/admin/img/user-management/academicStuff/',isset($academicStuff)? $academicStuff->image:'','academicStuff');
        self::$academicStuff->address                                   =$request->address;
        self::$academicStuff->highest_education                         =$request->highest_education;
        self::$academicStuff->created_by                                =$request->created_by;
        self::$academicStuff->slug                                      =str_replace('','-',$request->username);
        self::$academicStuff->status                                    =$request->status;
        self::$academicStuff->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'academic_stuffs';

    protected $casts = [
        'dob_timestamp' => 'datetime',
        'jod_timestamp' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stuff_creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function userSubmittedCertificates()
    {
        return $this->morphMany(
            UserSubmittedCertificate::class,
            'user_submitted_certificateable'
        );
    }

    public function attendances()
    {
        return $this->morphMany(Attendance::class, 'attendanceable');
    }
}
