<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryBook extends Model
{
    use HasFactory;
    use Searchable;


    protected $fillable = [
        'library_book_category_id',
        'name',
        'author_name',
        'publisher_name',
        'book_code',
        'price',
        'quantity',
        'due_quantity',
        'cover_image',
        'self_no',
        'slug',
        'status',
    ];

    protected static $book;
    public static function updateData($request,$id){
        self::$book=LibraryBook::find($id);
        self::insertData($request,self::$book);

    }

    public static function saveData($request){
        self::$book=new LibraryBook();
        self::insertData($request);
    }

    public static function insertData($request,$book=null){
        self::$book-> library_book_category_id = $request->library_book_category_id;
        self::$book-> name                     = $request->name;
        self::$book-> author_name              = $request->author_name;
        self::$book-> publisher_name           = $request->publisher_name;
        self::$book-> book_code                = $request->book_code;
        self::$book-> price                    = $request->price;
        self::$book-> quantity                 = $request->quantity;
        self::$book-> due_quantity             = $request->due_quantity;
        self::$book-> self_no                  = $request->self_no;
        self::$book-> cover_image              = isset($book) ? saveImage($request->file('cover_image'),'./backend/assets/BookImages/','cover_image',self::$book->cover_image,) : saveImage($request->file('cover_image'),'./backend/assets/BookImages/','cover_image','',) ;
        self::$book-> Slug                     = str_replace('','-',$request->name);
        self::$book-> status                   = $request->status == 'on' ? 1 : 0;
        self::$book->save();


    }

    protected $searchableFields = ['*'];

    protected $table = 'library_books';

    public function libraryBookCategory()
    {
        return $this->belongsTo(LibraryBookCategory::class);
    }
}
