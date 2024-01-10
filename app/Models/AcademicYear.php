<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'session_year_start',
        'session_year_end',
        'session_month_start',
        'session_month_end',
        'slug',
        'status',
    ];

    protected static $academicYear;

    public static function updateData($request, $id)
    {
        self::$academicYear = AcademicYear::find($id);
        self::insertData($request, self::$academicYear);
    }

    public static function saveData($request)
    {
        self::$academicYear = new AcademicYear();
        self::insertData($request);
    }

    public static function insertData($request, $academicYear = null)
    {
        self::$academicYear->session_year_start  = $request->session_year_start;
        self::$academicYear->session_year_end    = $request->session_year_end;
        self::$academicYear->session_month_start = $request->session_month_start;
        self::$academicYear->session_month_end   = $request->session_month_end;
        self::$academicYear->status              = $request->status == 'on' ? 1 : 0;
        self::$academicYear->slug                = str_replace(' ', '-', $request->session_year_start);
        self::$academicYear->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'academic_years';

    public function routines()
    {
        return $this->hasMany(Routine::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function examSchedules()
    {
        return $this->hasMany(ExamSchedule::class);
    }

    public function syllabi()
    {
        return $this->hasMany(Syllabus::class);
    }

    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function currentClassPromotions()
    {
        return $this->hasMany(
            ClassPromotion::class,
            'current_academic_year_id'
        );
    }

    public function promotedClassPromotions()
    {
        return $this->hasMany(
            ClassPromotion::class,
            'promoted_academic_year_id'
        );
    }

    public function studentFeePayments()
    {
        return $this->hasMany(StudentFeePayment::class);
    }

    public function sponsors()
    {
        return $this->hasMany(Sponsor::class);
    }
}
