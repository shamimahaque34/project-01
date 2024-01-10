@extends('backend.master')

@section('title')
    Hostel Member
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Hostel Member', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Hostel Member</h4>
                    <a href="{{ route('hostel_member.create') }}" class="btn btn-success float-end">
                        {{--                        <i class="mdi mdi-plus"></i>--}}
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Student Name</th>
                                <th>Teacher Name</th>
                                <th>Hostel</th>
                                <th>Hostel Balance</th>
                                <th>Jod</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hostelmembers as $hostelmember)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hostelmember->user_id }}</td>
                                    <td>{{ $hostelmember->student_id }}</td>
                                    <td>{{ $hostelmember->teacher_id }}</td>
                                    <td>{{ $hostelmember->hostel_id }}</td>
                                    <td>{{ $hostelmember->hostel_balance }}</td>
                                    <td>{{ $hostelmember->jod }}</td>
                                    <td>{{ $hostelmember->status == 0 ? 'Unpublished' : 'Publishid' }}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$hostelmember->id)}}" class="btn btn-{{$hostelmember->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$hostelmember->status==0? 'down':'up'}}"></i></a>--}}
                                        <a href="{{ route('hostel_member.edit', $hostelmember->id) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('hostel_member.destroy', $hostelmember->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Hostel Member'); ">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm py-0 px-1">
                                                <i class="dripicons-trash"></i>
                                            </button>
                                        </form>
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

