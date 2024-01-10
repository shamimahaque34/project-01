<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSchedule extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'starting_time',
        'starting_time_timestamp',
        'ending_time',
        'ending_time_timestamp',
        'slug',
        'status',
    ];


    
    protected static $classSchedule;

    public static function updateData($request, $id)
    {
        self::$classSchedule = ClassSchedule::find($id);
        self::insertData($request, self::$classSchedule);
    }

    public static function saveData($request)
    {
        self::$classSchedule = new ClassSchedule();
        self::insertData($request);
    }

    public static function insertData($request, $classSchedule = null)
    {
        self::$classSchedule->starting_time            = $request->starting_time;
        self::$classSchedule->starting_time_timestamp  = \Carbon\Carbon::parse($request->starting_time)->timestamp;
        self::$classSchedule->ending_time              = $request->ending_time;
        self::$classSchedule->ending_time_timestamp    =  \Carbon\Carbon::parse($request->ending_time)->timestamp;
        self::$classSchedule->status                   = $request->status == 'on' ? 1 : 0;
        self::$classSchedule->slug                     = str_replace(' ', '-', $request->starting_time);
        self::$classSchedule->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'class_schedules';

    protected $casts = [
        'starting_time_timestamp' => 'datetime',
        'ending_time_timestamp' => 'datetime',
    ];

    public function routine()
    {
        return $this->hasOne(Routine::class);
    }
}
