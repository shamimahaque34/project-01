<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hostel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'hostel_name',
        'hostel_type',
        'address',
        'fee',
        'class_type',
        'total_floor',
        'total_rooms',
        'seat_per_room',
        'note',
        'status',
    ];

    protected static $hostel;

    public static function updateData($request,$id){
        self::$hostel=Hostel::find($id);
        self::insertData($request,self::$hostel);
    }

    public static function saveData($request){
        self::$hostel=new Hostel();
        self::insertData($request,self::$hostel);
    }

    public static function insertData($request,$hostel=null){
        self::$hostel->hostel_name   = $request->hostel_name;
        self::$hostel->hostel_type   = $request->hostel_type;
        self::$hostel->address       = $request->address;
        self::$hostel->fee           = $request->fee;
        self::$hostel->class_type    = $request->class_type;
        self::$hostel->total_floor   = $request->total_floor;
        self::$hostel->total_rooms   = $request->total_rooms;
        self::$hostel->seat_per_room = $request->seat_per_room;
        self::$hostel->note          = $request->note;
        self::$hostel->status        = $request->status == 'on' ? 1 : 0;
        self::$hostel->save();
    }

    protected $searchableFields = ['*'];

    public function hostelMembers()
    {
        return $this->hasMany(HostelMember::class);
    }
}
