@extends('backend.master')

@section('title')
   Student Group
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Student Group', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Student Group</h4>
                    <a href="{{ route('student-groups.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Group Name</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($studentGroups as $studentGroup)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $studentGroup->group_name }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($studentGroup->note,8,'...') !!}</td>
                                    <td>{{ $studentGroup->status == 0 ? 'Unpublished' : 'Published' }}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('student-groups.edit',$studentGroup->slug) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('student-groups.destroy',$studentGroup->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Student Group'); ">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm py-0 px-1">
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

