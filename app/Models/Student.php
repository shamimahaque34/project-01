<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'parent_id',
        'section_id',
        'student_group_id',
        'main_subject_id',
        'optional_subject_id',
        'academic_class_id',
        'name_english',
        'name_bangla',
        'username',
        'email',
        'phone',
        'dob',
        'dob_timestamp',
        'gender',
        'blood_group',
        'registration_no',
        'roll_no',
        'religion',
        'address',
        'division',
        'district',
        'state',
        'country',
        'image',
        'extra_activities',
        'remarks',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob_timestamp' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(parent::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class);
    }

    public function mainSubject()
    {
        return $this->belongsTo(Subject::class, 'main_subject_id');
    }

    public function optionalSubject()
    {
        return $this->belongsTo(Subject::class, 'optional_subject_id');
    }

    public function examAttendances()
    {
        return $this->hasMany(ExamAttendance::class);
    }

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }

    public function classPromotions()
    {
        return $this->hasMany(ClassPromotion::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function studentFeePayments()
    {
        return $this->hasMany(StudentFeePayment::class);
    }

    public function hostelMember()
    {
        return $this->hasOne(HostelMember::class);
    }

    public function attendances()
    {
        return $this->morphMany(Attendance::class, 'attendanceable');
    }
}
