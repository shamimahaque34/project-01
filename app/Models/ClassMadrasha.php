<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassMadrasha extends Model
{
    use HasFactory;
    protected  $fillable=[
        'class_name',
        'class_numeric',
        'class_note',
        'class_lavel',
        'status'];

    protected static $class;
    public static function saveData($request,$id=null){

            self::$class=new ClassMadrasha();

        self::$class->class_name            =$request->class_name;
        self::$class->class_numeric         =$request->class_numeric;
        self::$class->class_note            =$request->class_note;
        self::$class->class_lavel           =$request->class_lavel;
        self::$class->status                =$request->status;
        self::$class->slug                  =str_replace('','-',$request->class_name.time());
        self::$class->save();

    }
    public static function updateData($request,$id){

            self::$class=ClassMadrasha::find($id);

        self::$class->class_name            =$request->class_name;
        self::$class->class_numeric         =$request->class_numeric;
        self::$class->class_note            =$request->class_note;
        self::$class->class_lavel           =$request->class_lavel;
        self::$class->status                =$request->status;
        self::$class->save();
    }
}
