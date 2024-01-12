<?php

namespace App\Http\Controllers\Admin\PaymentManagement;

use App\Http\Controllers\Controller;
use App\Models\AcademicClass;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentFeePayment;
use App\Models\AcademicYear;
use App\Models\Section;
use App\Models\FeeType;


class StudentFeePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.payment.student-fee-payment.manage',[
            'studentFeePayments'=>StudentFeePayment::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.payment.student-fee-payment.add', [
            'students'        => Student::all(),
            'academicYears'   =>AcademicYear::all(),
            'academicClasses' =>AcademicClass::all(),
            'sections'        =>Section::all(),
            'feeTypes'        =>FeeType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StudentFeePayment::saveData($request);
        return redirect()->route('student_fee_payments.index')->with('success',' Student Fee Payment Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.payment.student-fee-payment.add',[
            'studentFeePayment'=>StudentFeePayment::where('id',$id)->first(),
            'students'        =>Student::all(),
            'academicYears'   =>AcademicYear::all(),
            'academicClasses' =>AcademicClass::all(),
            'sections'        =>Section::all(),
            'feeTypes'        =>FeeType::all()
        
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        StudentFeePayment::updateData($request,$id);
        return redirect()->route('student_fee_payments.index')->with('success',' Student Fee Payment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentFeePayment=StudentFeePayment::find($id);
        $studentFeePayment->delete();
        return redirect()->route('student_fee_payments.index')->with('success','Student Fee Payment Deleted Successfully');
    }
}
