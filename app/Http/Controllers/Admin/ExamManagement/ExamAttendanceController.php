<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamAttendanceRequest;
use App\Models\AcademicClass;
use App\Models\Exam;
use App\Models\ExamAttendance;
use App\Models\ExamSchedule;
use App\Models\Section;
use Illuminate\Http\Request;

class ExamAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.examattendance.manage',[
            'attendance'=>ExamAttendance::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.examattendance.create',[
            'exams'=>Exam::all(),
            'schedules'=>ExamSchedule::all(),
            'sections'=>Section::all(),
            'academicClasses'=>AcademicClass::all(),
        ]);
          }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamAttendanceRequest $request)
    {
        ExamAttendance::saveData($request);
        return redirect()->route('exam_attendance.index')->with('success','Exam Attendance create successfully');

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
        return view('backend.exammanagement.examattendance.create',[
            'exams'=>Exam::all(),
            'schedules'=>ExamSchedule::all(),
            'sections'=>Section::all(),
            'academicClasses'=>AcademicClass::all(),
            'ExamAttendance'=>ExamAttendance::find($id),
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
        ExamAttendance::updateData($request,$id);
        return redirect()->route('exam_attendance.index')->with('success','Exam Attendance Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance=ExamAttendance::find($id);
        $attendance->delete();
        return redirect()->route('exam_attendance.index')->with('success','Exam Attendance Deleted successfully');

    }
}
