@extends('backend.master')

@section('title')
    Manage Academic StuffS
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Academic Stuff', 'child' => 'Manage'])
@endsection


@section('body')
    <section class="py-5">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-capitalize float-start">Manage Academic Stuff</h4>
                        <a href="{{ route('academic_stuff.create') }}" class="btn btn-success float-end">
                            Create
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>English Name</th>
                                    <th>Bangla Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Of Birth </th>
                                    <th>Date Of Birth Timestamp</th>
                                    <th>Gender</th>
                                    <th>Religion</th>
                                    <th>Joining Date</th>
                                    <th>Joining Date Timestamp</th>
                                    <th>Image</th>
                                    <th>Address</th>
                                    <th>Highest Education</th>
                                    <th>Created By</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stuffs as $academicStuff)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$academicStuff->user_name}}</td>
                                        <td>{{$academicStuff->name_english}}</td>
                                        <td>{{$academicStuff->name_bangla}}</td>
                                        <td>{{$academicStuff->email}}</td>
                                        <td>{{$academicStuff->phone}}</td>
                                        <td>{{$academicStuff->dob}}</td>
                                        <td>{{$academicStuff->dob_timestamp}}</td>
                                        <td>{{$academicStuff->gender}}</td>
                                        <td>{{$academicStuff->religion}}</td>
                                        <td>{{$academicStuff->jod}}</td>
                                        <td>{{$academicStuff->jod_timestamp}}</td>
                                        <td>{{$academicStuff->image}}</td>
                                        <td>{{$academicStuff->address}}</td>
                                        <td>{{$academicStuff->highest_education}}</td>
                                        <td>{{$academicStuff->created_by}}</td>
                                        <td>{{$academicStuff->slug}}</td>
                                        <td>{{$academicStuff->status==1?'Published':'Unpublished'}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('academic_stuff.show',$academicStuff->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>

                                                <a href="{{route('academic_stuff.edit',$academicStuff->id)}}" class="btn btn-sm btn-info ms-2"><i class="dripicons-document-edit"></i></a>
                                                <form action="{{route('academic_stuff.destroy',$academicStuff->id)}}" method="post" style="display:inline-block" onsubmit="return confirm('Are You Sure?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn ms-2 btn-sm btn-danger"><i class="dripicons-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
