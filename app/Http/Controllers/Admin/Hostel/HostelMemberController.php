<?php

namespace App\Http\Controllers\Admin\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Requests\HostelMemberRequest;
use App\Models\Hostel;
use App\Models\HostelMember;
use App\Models\User;
use Illuminate\Http\Request;

class HostelMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.hostel.hostelmember.manage',[
            'hostelmembers'=>HostelMember::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hostel.hostelmember.create',[
            'users'=>User::all(),
            'hostels'=>Hostel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HostelMemberRequest $request)
    {
        HostelMember::saveData($request);
        return redirect()->route('hostel_member.index')->with('success','Hostel Member created successfully');
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
        return view('backend.hostel.hostelmember.create',[
            'users'=>User::all(),
            'hostels'=>Hostel::all(),
            'hostelmember'=>HostelMember::find($id),
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
        HostelMember::updateData($request,$id);
        return redirect()->route('hostel_member.index')->with('success','Hostel Member update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hostelmember=HostelMember::find($id);
        $hostelmember->delete();
        return redirect()->route('hostel_member.index')->with('success','Hostel Member delete successfully');

    }
}
