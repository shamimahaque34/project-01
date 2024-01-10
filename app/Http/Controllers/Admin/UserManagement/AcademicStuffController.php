<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicStuffRequest;
use App\Models\AcademicStuff;
use Illuminate\Http\Request;

class AcademicStuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user-management.academic-stuff.manage',[
            'stuffs'=>AcademicStuff::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-management.academic-stuff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcademicStuffRequest $request)
    {
        return 'hello';
        AcademicStuff::saveData($request);
        return redirect()->route('academic_stuff.index')->with('success','Academic Stuff add successfully');
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
        return view('backend.user-management.academic-stuff.create',[
            'academicStuff'=>AcademicStuff::find($id),
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
        AcademicStuff::updateData($request,$id);
        return redirect()->route('academic_stuff.index')->with('success','Academic Stuff update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academicstuff=AcademicStuff::find($id);
        if (file_exists($academicstuff->image)){
            unlink($academicstuff->image);
        }
        $academicstuff->delete();
        return redirect()->route('academic_stuff.index')->with('success','Academic Stuff delete successfully');
    }
}
