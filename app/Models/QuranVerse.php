<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranVerse extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quran_chapter_id',
        'quran_font_id',
        'verse_arabic',
        'verse_bangla',
        'verse_english',
        'audio',
        'slug',
        'status',
    ];

    protected static $verse;

    public static function updateData($request, $id)
    {
        self::$verse = QuranVerse::find($id);
        self::insertData($request, self::$verse );
    }

    public static function saveData($request)
    {
        self::$verse  = new QuranVerse();
        self::insertData($request);
    }

    public static function insertData($request, $verse  = null)
    {
        self::$verse ->quran_chapter_id = $request->quran_chapter_id;
        self::$verse ->quran_font_id    = $request->quran_font_id;
        self::$verse ->verse_arabic     = $request->verse_arabic;
        self::$verse ->verse_bangla     = $request->verse_bangla;
        self::$verse ->verse_english    = $request->verse_english;
        self::$verse ->audio            = isset($verse) ? saveImage($request->file('audio'),'./backend/assets/audio/verseAudios/','audio',self::$verse->audio,) : saveImage($request->file('audio'),'./backend/assets/audio/verseAudios/','audio','',) ;
        self::$verse ->status            = $request->status == 'on' ? 1 : 0;
        self::$verse ->slug              = str_replace(' ', '-', $request->verse_bangla);
        self::$verse ->save();
       
    }



    protected $searchableFields = ['*'];

    protected $table = 'quran_verses';

    public function quranChapter()
    {
        return $this->belongsTo(QuranChapter::class);
    }

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }

    public function quranFont()
    {
        return $this->belongsTo(QuranFont::class);
    }
}
