@extends('backend.master')

@section('title')
    Library Member
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'  Library Member', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Library Member</h4>
                    <a href="{{ route('library_member.create') }}" class="btn btn-success float-end">
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
                                <th>Library</th>
                                <th>User</th>
                                <th>Member Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->library_id }}</td>
                                    <td>{{ $member->user_id }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->status == 0 ? 'Unpublished' : 'Publishid' }}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$member->id)}}" class="btn btn-{{$member->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$member->status==0? 'down':'up'}}"></i></a>--}}
                                        <a href="{{ route('library_member.edit', $member->id) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('library_member.destroy', $member->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Member'); ">
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

