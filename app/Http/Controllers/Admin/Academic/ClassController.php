<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use App\Models\Academic_Class;
use App\Models\ClassMadrasha;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return view('backend.academic.class.manage',[
            'classes'=>ClassMadrasha::all(),
        ]);
    }

    public function create()
    {
        return view('backend.academic.class.create');
    }

    public function store(Request $request)
    {
        ClassMadrasha::saveData($request);
        return redirect()->route('classes.index')->with('success','Class Create Successfully');
    }

    public function show($id)
    {

    }

    public function edit($slug)
    {
        return view('backend.academic.class.create',[
            'class'=>ClassMadrasha::where('slug',$slug)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        ClassMadrasha::updateData($request,$id);
        return redirect()->route('classes.index')->with('success','Class Update Successfully');
    }

    public function destroy($slug)
    {
        $mdclass=ClassMadrasha::where('slug',$slug)->first();
        $mdclass->delete();
        return redirect()->route('classes.index')->with('success','Class Delete Successfully');
    }
}
