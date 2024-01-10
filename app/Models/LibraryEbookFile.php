<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryEbookFile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'library_ebook_id',
        'file_name',
        'file_url',
        'file_type',
    ];


    protected static $ebookfile;
    public static function updateData($request,$id){
        self::$ebookfile=LibraryEbookFile::find($id);
        self::insertData($request,self::$ebookfile);

    }

    public static function saveData($request){
        self::$ebookfile=new LibraryEbookFile();
        self::insertData($request);
    }

    public static function insertData($request,$ebookfile=null){
        self::$ebookfile->library_ebook_id = $request->library_ebook_id;
        self::$ebookfile->file_name        = saveImage($request->file('file_name'),'backend/admin/img/LibraryEbookFile/files/',isset($ebookfile)? $ebookfile->file_name:'','filename');
        self::$ebookfile->file_url         = url('/').'/'.self::$ebookfile->file_name;
//        self::$ebookfile-> Slug                                     =str_replace('','-',$request->name);
//        self::$ebookfile-> status                                   =$request->status;
        self::$ebookfile->file_type        = $request->file('file_name')->getClientOriginalExtension();
        self::$ebookfile->save();
    }



    protected $searchableFields = ['*'];

    protected $table = 'library_ebook_files';

    public function libraryEbook()
    {
        return $this->belongsTo(LibraryEbook::class);
    }
}
