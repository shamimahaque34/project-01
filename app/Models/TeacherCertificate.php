<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCertificate extends Model
{
    use HasFactory;

    protected static $certificate;

    protected $fillable=[
        'teacher_id',
        'file_path',
        'extension',
    ];

    public static function saveCertificate($request,$id){

        $filePaths=$request->file('file_path');

//        return $filePaths;

        if (isset($filePaths)){
            foreach ($filePaths as $filepath){
                self::$certificate=new TeacherCertificate();
                self::$certificate->teacher_id                  =$id;
                self::$certificate->file_path                   =saveImage($filepath,'backend/admin/img/teacherCertificates/',' ','teachercertificate');
                self::$certificate->extension                   =$filepath->getClientOriginalExtension();
                self::$certificate->save();
            }
        }else{
            return 0;
        }

    }
    public static function updatecertificate($request,$id){

//        $filePaths=$request->file('file_path');
        $extension=$request->file('file_path')->getClientOriginalExtension();


//        return $filePaths;

//        if (isset($filePaths)){
//            foreach ($filePaths as $filepath){
                self::$certificate=TeacherCertificate::find($id);
                if (isset(self::$certificate->file_path)){
                    $extension=self::$certificate->getClientOriginalExtension();
                }

                self::$certificate->teacher_id                  =$request->teacher_id;
                self::$certificate->file_path                   =saveImage($request->file('file_path'),'backend/admin/img/teacherCertificates/',self::$certificate->file_path,'teachercertificate');
                self::$certificate->extension                   =$extension;
                self::$certificate->save();


    }

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }

}
