<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Syllabus;
use App\Models\AcademicYear;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.syllabus.manage', [
            'syllabuses' => Syllabus::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.syllabus.create',[
            'academicYears' => AcademicYear::all(),
            'subjects'      => Subject::all(),
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
        Syllabus::saveData($request);
        return redirect()
            ->route('syllabuses.index')
            ->with('success', 'Syllabus Create Succesfully');
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
    public function edit($slug)
    {
        
        return view('backend.academic.syllabus.create', [
            'academicYears' => AcademicYear::all(),
            'subjects'      => Subject::all(),
            'syllabus'    => Syllabus::where('slug', $slug)->first(),
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
        Syllabus::updateData($request, $id);
        return redirect()
            ->route('syllabuses.index')
            ->with('success', 'Syllabus Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $syllabus = Syllabus::where('slug', $slug)->first();
        if (file_exists($syllabus->file)) {
            unlink($syllabus->file);
        }
        $syllabus->delete();
        return redirect()
            ->route('syllabuses.index')
            ->with('success', 'Syllabus Delete Succesfully');
    }
}
