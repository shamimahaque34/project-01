@extends('backend.master')

@section('title')
   Manage Teachers
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Teacher', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Teacher</h4>
                    <a href="{{ route('user_management_teacher.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Slug</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>Religion</th>
                                <th>Joining Date</th>
                                <th>Photo</th>
                                <th>Address</th>
                                <th>Username</th>
                                <th>Subject</th>
                                <th>Highest Education</th>
                                <th>Created By</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->slug }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td>{{ $teacher->designation }}</td>
                                    <td>{{ $teacher->date_of_birth }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td>{{ $teacher->religion }}</td>
                                    <td>{{ $teacher->joining_date }}</td>
                                    <td>
                                        <img src="{{asset($teacher->image) }}" style="height: 100px;width: 100px" alt="">
                                    </td>
                                    <td>{!! $teacher->address !!}</td>
                                    <td>{{ $teacher->user_name}}</td>
                                    <td>{{ $teacher->subject}}</td>
                                    <td>{{ $teacher->highest_education}}</td>
                                    <td>{{ $teacher->created_by}}</td>
                                    <td>{{ $teacher->password}}</td>
                                    <td>{{$teacher->status==1?'Published':'Unpublished'}}</td>
                                     <td>
                                        <div class=d-flex>
                                        <a href="{{route('user_management_teacher.show',$teacher->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>
                                        <a href="{{ route('user_management_teacher.edit', $teacher->id) }}" class="btn btn-info btn-sm ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('user_management_teacher.destroy', $teacher->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class'); ">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm ms-2">
                                                <i class="dripicons-trash"></i>
                                            </button>
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
@endsection

