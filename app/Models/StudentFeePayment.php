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
         
        self::$studentFeePayment ->user_id           = $request->user_id;
        self::$studentFeePayment ->student_id        = $request->student_id;
        self::$studentFeePayment ->academic_year_id  = $request->academic_year_id;
        self::$studentFeePayment ->academic_class_id = $request->academic_class_id;
        self::$studentFeePayment ->section_id        = $request->section_id;
        self::$studentFeePayment->fee_type_id        = $request->fee_type_id;
        self::$studentFeePayment->month              = $request->month;
        self::$studentFeePayment->amount             = $request->amount;
        self::$studentFeePayment->due                = $request->due ;
        self::$studentFeePayment->status             = $request->status;
        self::$studentFeePayment->payment_method     = $request->txt_id;
        self::$studentFeePayment->txt_id             = $request->status;
        self::$studentFeePayment->save();
        
    }

    public static function updateData($request,$id)
    {   
        self::$studentFeePayment = StudentFeePayment::findOrFail($id);

        self::$studentFeePayment ->user_id           = $request->user_id;
        self::$studentFeePayment ->student_id        = $request->student_id;
        self::$studentFeePayment ->academic_year_id  = $request->academic_year_id;
        self::$studentFeePayment ->academic_class_id = $request->academic_class_id;
        self::$studentFeePayment ->section_id        = $request->section_id;
        self::$studentFeePayment->fee_type_id        = $request->fee_type_id;
        self::$studentFeePayment->month              = $request->month;
        self::$studentFeePayment->amount             = $request->amount;
        self::$studentFeePayment->due                = $request->due ;
        self::$studentFeePayment->status             = $request->status;
        self::$studentFeePayment->payment_method     = $request->txt_id;
        self::$studentFeePayment->txt_id             = $request->status;
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
