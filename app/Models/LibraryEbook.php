<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryEbook extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'library_book_category_id',
        'academic_class_id',
        'name',
        'author_name',
        'book_code',
        'price',
        'cover_image',
        'slug',
        'status',
    ];

    protected static $book;
    public static function updateData($request,$id){
        self::$book=LibraryEbook::find($id);
        self::insertData($request,self::$book);

    }

    public static function saveData($request){
        self::$book=new LibraryEbook();
        self::insertData($request);
    }

    public static function insertData($request,$book=null){
        self::$book-> library_book_category_id = $request->library_book_category_id;
        self::$book-> academic_class_id        = $request->academic_class_id;
        self::$book-> name                     = $request->name;
        self::$book-> author_name              = $request->author_name;
        self::$book-> book_code                = $request->book_code;
        self::$book-> price                    = $request->price;
        self::$book-> cover_image              = isset($book) ? saveImage($request->file('cover_image'),'./backend/assets/EBookImages/','cover_image',self::$book->cover_image,) : saveImage($request->file('cover_image'),'./backend/assets/EBookImages/','cover_image','',) ;
        self::$book-> Slug                     = str_replace('','-',$request->name);
        self::$book-> status                   = $request->status == 'on' ? 1 : 0;
        self::$book->save();
    }


    protected $searchableFields = ['*'];

    protected $table = 'library_ebooks';

    public function libraryBookCategory()
    {
        return $this->belongsTo(LibraryBookCategory::class);
    }

    public function libraryEbookFiles()
    {
        return $this->hasMany(LibraryEbookFile::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
