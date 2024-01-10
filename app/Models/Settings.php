<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable=[
        'site_title',
        'site_name',
        'site_logo',
        'site_favicon',
        'site_banner',
        'site_meta',
        'madrasha_email',
        'madrasha_address',
        'madrasha_division',
        'madrasha_district'];

    protected static $setting;

    public static function SaveData($request){
        $checkExistRow=Settings::first();

        if (isset($checkExistRow)){
            self::$setting=Settings::find($checkExistRow->id);

        }else{
            self::$setting=new Settings();
        }

        if ($request->setting_category=='general'){
            self::$setting->site_title                  =$request->site_title;
            self::$setting->site_name                   =$request->site_name;
            self::$setting->site_logo                   =saveImage($request->file('site_logo'),'backend/admin/img/setting/',self::$setting->site_logo,'site_logo');
            self::$setting->site_favicon                =saveImage($request->file('site_favicon'),'backend/admin/img/setting/',self::$setting->site_favicon,'site_favicon');
            self::$setting->site_banner                 =saveImage($request->file('site_banner'),'backend/admin/img/setting/',self::$setting->site_banner,'site_banner');
            self::$setting->site_meta                   =$request->site_meta;
            self::$setting->madrasha_email              =$request->madrasha_email;
            self::$setting->madrasha_address            =$request->madrasha_address;
            self::$setting->madrasha_division           =$request->madrasha_division;
            self::$setting->madrasha_district           =$request->madrasha_district;


        }elseif ($request->setting_category=='localization'){

        }elseif ($request->setting_category=='payment'){

        }elseif ($request->setting_category=='email'){

        }elseif ($request->setting_category=='sociallogin'){

        }elseif ($request->setting_category=='sociallinks'){

        }elseif ($request->setting_category=='ceo'){

        }elseif ($request->setting_category=='others'){

        }
        self::$setting->save();
    }
}
