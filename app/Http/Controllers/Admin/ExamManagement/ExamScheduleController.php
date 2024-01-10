<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamScheduleRequest;
use App\Models\Exam;
use App\Models\ExamSchedule;
use App\Models\AcademicYear;
use App\Models\AcademicClass;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.examschedule.manage',[
            'schedul'=>ExamSchedule::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.examschedule.create',[
            'exams'=>Exam::all(),
            'sections'=>Section::all(),
            'subjects'=>Subject::all(),
            'academicClasses'=>AcademicClass::all(),
            'academicYears'=>AcademicYear::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamScheduleRequest $request)
    {
        ExamSchedule::saveData($request);
        return redirect()->route('exam_schedule.index')->with('success','Exam Schedule create successfully');
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
        return view('backend.exammanagement.examschedule.create',[
            'exams'=>Exam::all(),
            'sections'=>Section::all(),
            'subjects'=>Subject::all(),
            'academicClasses'=>AcademicClass::all(),
            'academicYears'=>AcademicYear::all(),
            'examShedule'=>ExamSchedule::find($id),
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
        ExamSchedule::updateData($request,$id);
        return redirect()->route('exam_schedule.index')->with('success','Exam Schedule Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedul=ExamSchedule::find($id);
        $schedul->delete();
        return redirect()->route('exam_schedule.index')->with('success','Exam Schedule deleted successfully');

    }
}
