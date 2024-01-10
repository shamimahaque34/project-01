<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryBookCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    protected static $bookcategory;
    public static function updateData($request,$id){
        self::$bookcategory=LibraryBookCategory::find($id);
        self::insertData($request,self::$bookcategory);

    }

    public static function saveData($request){
        self::$bookcategory=new LibraryBookCategory();
        self::insertData($request);
    }

    public static function insertData($request,$bookcategory=null){
        self::$bookcategory-> name   = $request->name;
        self::$bookcategory-> Slug   = str_replace('','-',$request->name);
        self::$bookcategory-> status = $request->status == 'on' ? 1 : 0;
        self::$bookcategory->save();


    }


    protected $searchableFields = ['*'];

    protected $table = 'library_book_categories';

    public function libraryBooks()
    {
        return $this->hasMany(LibraryBook::class);
    }

    public function libraryEbooks()
    {
        return $this->hasMany(LibraryEbook::class);
    }
}
