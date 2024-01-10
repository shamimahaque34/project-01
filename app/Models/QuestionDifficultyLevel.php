<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionDifficultyLevel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'slug',
        'status'
    ];

    protected static $questiondifficulty;

    public static function updateData($request,$id){
        self::$questiondifficulty=QuestionDifficultyLevel::find($id);
        self::insertData($request,self::$questiondifficulty);
    }

    public static function saveData($request){
        self::$questiondifficulty=new QuestionDifficultyLevel();
        self::insertData($request);
    }

    public static function insertData($request,$questiondifficulty=null){
        self::$questiondifficulty->title  = $request->title;
        self::$questiondifficulty->slug   = str_replace('','-',$request->title);
        self::$questiondifficulty->status = $request->status == 'on' ? 1 : 0;
        self::$questiondifficulty->save();
    }


    protected $searchableFields = ['*'];

    protected $table = 'question_difficulty_levels';

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
