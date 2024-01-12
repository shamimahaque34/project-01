<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentFeePayment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'student_id',
        'academic_year_id',
        'academic_class_id',
        'section_id',
        'fee_type_id',
        'month',
        'amount',
        'due',
        'status',
        'payment_method',
        'txt_id',
    ];

    protected static $studentFeePayment;

    public static function saveData($request){
        
        self::$studentFeePayment = new StudentFeePayment();
         
        self::$studentFeePayment ->user_id    = $request->teacher_id;
        self::$studentFeePayment->fee_type    =$request->fee_type;
        self::$studentFeePayment->slug        =str_replace(' ','-',$request->fee_type);
        self::$studentFeePayment->note        =$request->note ;
        self::$studentFeePayment->status      =$request->status;
        self::$studentFeePayment->save();
        
    }

    protected $searchableFields = ['*'];

    protected $table = 'student_fee_payments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function studentFeePayment()
    {
        return $this->belongsTo(studentFeePayment::class);
    }
}
