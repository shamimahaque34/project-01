<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTranslationProvider extends Model
{
    use HasFactory;
//    use Searchable;

    protected $fillable = [
        'brand_name',
        'translated_by',
        'language',
        'slug',
        'status',
    ];


    protected static $transProvider;

    public static function updateData($request,$id){
        self::$transProvider=QuranTranslationProvider::find($id);
        self::insertData($request,self::$transProvider);

    }

    public static function saveData($request){
        self::$transProvider=new QuranTranslationProvider();
        self::insertData($request);
    }

    public static function insertData($request,$transProvider=null){
        self::$transProvider->brand_name    = $request->brand_name;
        self::$transProvider->translated_by = $request->translated_by;
        self::$transProvider->language      = $request->language;
        self::$transProvider->status        = $request->status == 'on' ? 1 : 0;
        self::$transProvider->slug          = str_replace(' ', '-',rand(10,100).$request->brand_name);
        self::$transProvider->save();
    }


    protected $searchableFields = ['*'];

    protected $table = 'quran_translation_providers';

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }
}
