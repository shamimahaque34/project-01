<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Parentstudent extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'username',
        'name',
        'email',
        'phone',
        'fathers_profession',
        'mothers_profession',
        'dob',
        'dob_timestamp',
        'gender',
        'religion',
        'image',
        'address',
        'slug',
        'status',
    ];

    protected static $parent;
    protected static $user;


    public static function updateData($request,$id){
        $userid=self::$parent->user_id;
        self::$user=User::updateUser($request,$userid);
        self::$parent=Parentstudent::find($id);
        self::insertData($request,self::$parent);

    }

    public static function saveData($request){
        self::$user=User::saveData($request);
        self::$parent=new Parentstudent();
        self::insertData($request);
    }
    public static function insertData($request,$parent=null){



        self::$parent->user_id               =self::$user;
        self::$parent-> name                 =$request->name;
        self::$parent-> email                =$request->email;
        self::$parent-> username            =$request->username;
//        self::$parent-> subject              =$request->subject;
        self::$parent-> phone                =$request->phone;
        self::$parent-> fathers_profession                =$request->fathers_profession;
        self::$parent-> mothers_profession                =$request->mothers_profession;
//        self::$parent-> desination           =$request->desination;
        self::$parent-> dob                  =$request->dob;
        self::$parent-> dob_timestamp                  =$request->dob_timestamp;
        self::$parent-> gender               =$request->gender;
        self::$parent-> religion             =$request->religion;
//        self::$parent-> joining_date         =$request->joining_date;
        self::$parent-> image                =saveImage($request->file('image'),'backend/admin/img/parent/',self::$parent->photo,'parentImage');
        self::$parent-> address              =$request->address;
//        self::$parent-> education            =$request->education;
//        self::$parent-> password             =$request->password;
//        self::$parent-> created_by           =Auth::id();
        self::$parent-> Slug                 =str_replace('','-',$request->user_name);
        self::$parent-> status               =$request->status;
        self::$parent->save();
    }
    protected $searchableFields = ['*'];

    protected $casts = [
        'dob_timestamp' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
