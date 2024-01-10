<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;

class TeacherEducationalCerts extends Model
{
    use HasFactory;

    protected $fillable=[
        'teacher_id',
        'file_path',
        'file_extension',
    ];
    protected static $teacherEducationalCerts;
    protected static $certificate;
    protected static $certsExtension;
    protected static $certsName;
    protected static $certsDirectory;

    protected static function saveTeacherEducationalCerts($request, $teacher)
    {   self::$certificate =$request->file('educational_certs');
        foreach (self::$certificate as $certs)
        {
        if($certs)
        {   
            self::$certsExtension =$certs->getClientOriginalExtension();
            
            self::$certsName = 'teacher-educational-certs'.rand(1,1000).time().'.'.$certs->getClientOriginalExtension();
            if( self::$certsExtension == 'jpg'||'png')
            {
            self::$certsDirectory = './backend/assets/teacherEducationalCerts/image/';
            }
            elseif(self::$certsExtension == 'pdf')
            {
                self::$certsDirectory = './backend/assets/teacherEducationalCerts/pdf/';
            }

            $certs->move(self::$certsDirectory, self::$certsName);
             self::$certsDirectory.self::$certsName;
        }
        
    
       
        {
            self::$teacherEducationalCerts = new TeacherEducationalCerts();
            self::$teacherEducationalCerts->teacher_id = $teacher->id;
           
            self::$teacherEducationalCerts->file_path =self::$certsDirectory ; 
            self::$teacherEducationalCerts->file_extension =  self::$certsExtension;
            self::$teacherEducationalCerts->save();
        }
}
}


public static function updateTeacherEducationalCerts($request, $teacher ,$id)
    {
        self::$teacherEducationalCerts = TeacherEducationalCerts::where('teacher_id',$id)->get();
        foreach(self::$teacherEducationalCerts as $teacherEducationalCert)
        {
            if(file_exists($teacherEducationalCert->educational_certs))
            {
                unlink($teacherEducationalCert->educational_certs);
            }

            $teacherEducationalCert->delete();
        }

        self::$certificate =$request->file('educational_certs');

       
        {
            self::$teacherEducationalCerts = new TeacherEducationalCerts();
            self::$teacherEducationalCerts->teacher_id = $teacher->id;
           
            self::$teacherEducationalCerts->file_path =self::$certsDirectory ; 
            self::$teacherEducationalCerts->file_extension =  self::$certsExtension;
            self::$teacherEducationalCerts->save();     
        }

    }

}
