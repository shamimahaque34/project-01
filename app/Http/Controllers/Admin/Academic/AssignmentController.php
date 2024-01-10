<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Assignment;
use App\Models\AcademicClass;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.assignment.manage', [
            'assignments' => Assignment::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.assignment.create',[
            'academicClasses' => AcademicClass::all(),
            'subjects'      => Subject::all(),
            'sections'      => Section::all(),
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
        Assignment::saveData($request);
        return redirect()
            ->route('assignments.index')
            ->with('success', 'Assignment Create Succesfully');
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
        return view('backend.academic.assignment.create', [
            'academicClasses' => AcademicClass::all(),
            'subjects'        => Subject::all(),
            'sections'        => Section::all(),
            'assignment'      => Assignment::where('slug', $slug)->first(),
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
        Assignment::updateData($request, $id);
        return redirect()
            ->route('assignments.index')
            ->with('success', 'Assignment Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $assignment = Assignment::where('slug', $slug)->first();
        if (file_exists($assignment->file)) {
            unlink($assignment->file);
        }
        $assignment->delete();
        return redirect()
            ->route('assignments.index')
            ->with('success', 'Assignment Delete Succesfully');
    }
}
