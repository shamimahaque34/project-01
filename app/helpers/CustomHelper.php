<?php

namespace App\helpers;

class CustomHelper
{
    protected static $fileName;
    protected static $fileUrl;

    public static function fileUpload($image,$directory,$existFile=null){
        if ($image){
            if (file_exists($existFile)){
                unlink($existFile);
            }
            self::$fileName=time().rand(10,2000).'.'.$image->getClientOriginalExtension();
//            self::$fileName="helloooooooo";
            $image->move($directory,self::$fileName);
            self::$fileUrl=$directory.self::$fileName;

        }else{
//            if (isset($existFile)){
//                self::$fileUrl=$existFile;
//            }else{
//                self::$fileUrl='';
//            }
            self::$fileName='ami pari na ';
        }

//        return self::$fileUrl;
        return $image;

    }

}
