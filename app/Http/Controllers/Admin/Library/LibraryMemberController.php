<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryMemberRequest;
use App\Models\LibraryMember;
use App\Models\User;
use Illuminate\Http\Request;

class LibraryMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.library.member.manage',[
           'members'=>LibraryMember::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.library.member.create',[
            'users'=>User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryMemberRequest $request)
    {
        LibraryMember::saveData($request);
        return redirect()->route('library_member.index')->with('success','Member add Successfylly');
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
        return view('backend.library.member.create',[
            'users'=>User::all(),
            'member'=>LibraryMember::find($id),
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
        LibraryMember::updateData($request,$id);
        return redirect()->route('library_member.index')->with('success','Member update Successfylly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member=LibraryMember::find($id);
        $member->delete();
        return redirect()->route('library_member.index')->with('success','Member delete Successfylly');
    }

}
