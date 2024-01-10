<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryMember extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'library_id',
        'user_id',
        'name',
        'email',
        'phone'
    ];


    protected static $member;
    public static function updateData($request,$id){
        self::$member=LibraryMember::find($id);
        self::insertData($request,self::$member);

    }

    public static function saveData($request){
        self::$member=new LibraryMember();
        self::insertData($request);
    }

    public static function insertData($request,$member=null){
        self::$member-> library_id                 =$request->library_id;
        self::$member-> user_id                    =$request->user_id; //user tabele id
        self::$member-> name                       =$request->name;
        self::$member-> email                      =$request->email;
        self::$member-> phone                      =$request->phone;
        self::$member->save();
    }



    protected $searchableFields = ['*'];

    protected $table = 'library_members';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
