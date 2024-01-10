<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionBankAnswerOption extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'question_id',
        'option_name',
        'full_ans',
        'option_img',
        'is_correct',
    ];

   

    // public static function updateData($request,$id){
    //     self::$question=Question::find($id);
    //     self::insertData($request,self::$question);
    // }

   

    


    protected $searchableFields = ['*'];

    protected $table = 'question_bank_answer_options';

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
