<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranFont extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['quran_font', 'slug', 'status'];

    protected static $quranFont;

    public static function updateData($request, $id)
    {
        self::$quranFont = QuranFont::find($id);
        self::insertData($request, self::$quranFont);
    }

    public static function saveData($request)
    {
        self::$quranFont = new QuranFont();
        self::insertData($request);
    }

    public static function insertData($request, $quranFont = null)
    {
        self::$quranFont->quran_font = $request->quran_font;
        self::$quranFont->status     = $request->status == 'on' ? 1 : 0;
        self::$quranFont->slug       = str_replace(' ', '-', $request->quran_font);
        self::$quranFont->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'quran_fonts';

    public function quranVerses()
    {
        return $this->hasMany(QuranVerse::class);
    }
}
