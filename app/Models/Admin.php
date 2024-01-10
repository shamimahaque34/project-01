<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Admin extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'name_english',
        'name_bangla',
        'username',
        'email',
        'phone',
        'dob',
        'dob_timestamp',
        'gender',
        'religion',
        'image',
        'address',
        'slug',
        'status',
    ];


    protected static $admin;

    public static function saveData($request)
    {
       self::$admin = new Admin();
       Admin::insertData($request);
    }

    public static function updateData($request,$id)
    {
      self::$admin = Admin::find($id);
      Admin::insertData($request,self::$admin);
    }

    public static function insertData($request,$admin = null)
    {
        self::$admin->user_id       =Auth::id();
        self::$admin->name_english  = $request->name_english;
        self::$admin->name_bangla   = $request->name_bangla;
        self::$admin->username      = $request->username;
        self::$admin->email         = $request->email;
        self::$admin->phone         = $request->phone;
        self::$admin->dob           = $request->dob ;
        self::$admin->dob_timestamp = $request->dob_timestamp ;
        self::$admin->gender        = $request->gender;
        self::$admin->religion      = $request->religion;
        self::$admin->image         = isset($admin) ? saveImage($request->file('image'),'./backend/assets/adminImages/','image',self::$admin->image,) : saveImage($request->file('image'),'./backend/assets/AdminImages/','image','',) ;
        self::$admin->address       = $request->address;
        self::$admin->slug          = str_replace(' ','-',$request->name_english);
        self::$admin->status        = $request->status;
        self::$admin->save();
    }

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob_timestamp' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
