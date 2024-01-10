<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Teacher extends Model
{
    use HasFactory;
    protected static $teacher;
    protected static $user;
    protected static $certificate;
    protected static $filePaths;
    protected $fillable=[
        'user_id',
        'name',
        'email',
        'user_name',
        'subject',
        'Phone',
        'desination',
        'dob',
        'gender',
        'religion',
        'joining_date',
        'photo',
        'address',
        'education',
        'password',
        'created_by',
        'Slug',
        'status',
        ];

    public static function saveData($request){
        $user=User::saveData($request);

        self::$teacher=new Teacher();

        self::$teacher->user_id               =$user;
        self::$teacher-> name                 =$request->name;
        self::$teacher-> email                =$request->email;
        self::$teacher-> user_name            =$request->user_name;
        self::$teacher-> subject              =$request->subject;
        self::$teacher-> phone                =$request->phone;
        self::$teacher-> desination           =$request->desination;
        self::$teacher-> dob                  =$request->dob;
        self::$teacher-> gender               =$request->gender;
        self::$teacher-> religion             =$request->religion;
        self::$teacher-> joining_date         =$request->joining_date;
        self::$teacher-> photo                =saveImage($request->file('photo'),'backend/admin/img/teacher/',' ','teacherImage');
        self::$teacher-> address              =$request->address;
        self::$teacher-> education            =$request->education;
        self::$teacher-> password             =bcrypt($request->password) ;
        self::$teacher-> created_by           =Auth::id();
        self::$teacher-> Slug                 =str_replace('','-',$request->user_name);
        self::$teacher-> status               =$request->status;
        self::$teacher->save();

        TeacherCertificate::saveCertificate($request,self::$teacher->id);

    }
    public static function updateData($request,$id){



        self::$teacher=Teacher::find($id);
        $userid=self::$teacher->user_id;
        $user=User::updateUser($request,$userid);

        self::$teacher->user_id               =$user;
        self::$teacher-> name                 =$request->name;
        self::$teacher-> email                =$request->email;
        self::$teacher-> user_name            =$request->user_name;
        self::$teacher-> subject              =$request->subject;
        self::$teacher-> phone                =$request->phone;
        self::$teacher-> desination           =$request->desination;
        self::$teacher-> dob                  =$request->dob;
        self::$teacher-> gender               =$request->gender;
        self::$teacher-> religion             =$request->religion;
        self::$teacher-> joining_date         =$request->joining_date;
        self::$teacher-> photo                =saveImage($request->file('photo'),'backend/admin/img/teacher/',self::$teacher->photo,'teacherImage');
        self::$teacher-> address              =$request->address;
        self::$teacher-> education            =$request->education;
        self::$teacher-> password             =$request->password;
        self::$teacher-> created_by           =Auth::id();
        self::$teacher-> Slug                 =str_replace('','-',$request->user_name);
        self::$teacher-> status               =$request->status;
        self::$teacher->save();

        TeacherCertificate::saveCertificate($request,self::$teacher->id);

    }
}
