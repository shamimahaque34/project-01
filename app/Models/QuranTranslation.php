<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTranslation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quran_chapter_id',
        'quran_verse_id',
        'quran_translation_provider_id',
        'translated_verse',
        'slug',
        'status',
    ];
    protected static $translation;

    public static function updateData($request, $id)
    {
        self::$translation = QuranTranslation::find($id);
        self::insertData($request, self::$translation);
    }

    public static function saveData($request)
    {
        self::$translation = new QuranTranslation();
        self::insertData($request);
    }

    public static function insertData($request, $translation = null)
    {
        self::$translation->quran_chapter_id              = $request->quran_chapter_id;
        self::$translation->quran_verse_id                = $request->quran_verse_id;
        self::$translation->quran_translation_provider_id = $request->quran_translation_provider_id;
        self::$translation->translated_verse              = $request->translated_verse;
        self::$translation->status                        = $request->status == 'on' ? 1 : 0;
        self::$translation->slug                          = str_replace(
            ' ',
            '-',
            $request->quran_chapter_id
        );
        self::$translation->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'quran_translations';

    public function quranChapter()
    {
        return $this->belongsTo(QuranChapter::class);
    }

    public function quranVerse()
    {
        return $this->belongsTo(QuranVerse::class);
    }

    public function quranTranslationProvider()
    {
        return $this->belongsTo(QuranTranslationProvider::class);
    }
}
