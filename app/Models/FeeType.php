<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['fee_type', 'note', 'slug', 'status'];

    protected static $feeType;

    public static function saveData($request){
        
        self::$feeType = new FeeType();

        self::$feeType->fee_type    =$request->fee_type;
        self::$feeType->slug        =str_replace(' ','-',$request->fee_type);
        self::$feeType->note        =$request->note ;
        self::$feeType->status      =$request->status;
        self::$feeType->save();
        
    }

    public static function updateData($request,$id)
    {   
        self::$feeType = feeType::findOrFail($id);

        self::$feeType->fee_type    =$request->fee_type;
        self::$feeType->slug        =str_replace(' ','-',$request->fee_type);
        self::$feeType->note        =$request->note ;
        self::$feeType->status      =$request->status;
        self::$feeType->save();

       
    }


    protected $searchableFields = ['*'];

    protected $table = 'fee_types';

    public function studentFeePayments()
    {
        return $this->hasMany(StudentFeePayment::class);
    }
}
