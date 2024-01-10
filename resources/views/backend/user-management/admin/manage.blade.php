@extends('backend.master')

@section('title')
    Manage Admin
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Admin', 'child' => 'Manage'])
@endsection


@section('body')
    <section class="py-5">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-capitalize float-start">Manage Admin</h4>
                        <a href="{{ route('user_admin.create') }}" class="btn btn-success float-end">
                            Create
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
                                <th>Image</th>
                                <th>Address</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$admin->user_name}}</td>
                                    <td>{{$admin->name_english}}</td>
                                    <td>{{$admin->name_bangla}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->phone}}</td>
                                    <td>{{$admin->dob}}</td>
                                    <td>{{$admin->dob_timestamp}}</td>
                                    <td>{{$admin->gender}}</td>
                                    <td>{{$admin->religion}}</td>
                                    <td>{{$admin->image}}</td>
                                    <td>{{$admin->address}}</td>
                                    <td>{{$admin->slug}}</td>
                                    <td>{{$admin->status==1?'Published':'Unpublished'}}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('user_admin.show',$admin->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>

                                        <a href="{{route('user_admin.edit',$admin->id)}}" class="btn btn-sm btn-info ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{route('user_admin.destroy',$admin->id)}}" method="post" style="display:inline-block" onsubmit="return confirm('Are You Sure?')">
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
    </section>
@endsection
