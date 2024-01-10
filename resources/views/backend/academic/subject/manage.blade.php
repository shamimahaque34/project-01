@extends('backend.master')

@section('title')
    Subjects
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'subject', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Subject</h4>
                    <a href="{{ route('subjects.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Educational Stage Name</th>
                                <th>Updated By</th>
                                <th>Student Group Name</th>
                                <th>Academic Class Name</th>
                                <th>Subject Name</th>
                                <th>Subject Type</th>
                                <th>Pass Mark</th>
                                <th>Final Mark</th>
                                <th>Point</th>
                                <th>Subject Author</th>
                                <th>Subject Code</th>
                                <th>Subject Book Image</th>
                                <th>Is For Graduation</th>
                                <th>Is Main Subject</th>
                                <th>Is Optional</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subj)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subj->educationalStage->group_name ?? '' }}</td>
                                    <td>{{ $subj->updated_by}}</td>
                                    <td>{{ $subj->studentGroup->group_name ?? '' }}</td>
                                    <td>{{ $subj->academicClass->class_name ?? '' }}</td>
                                    <td>{{ $subj->Subject_name }}</td>
                                    <td>{!! $subj->subject_type__optional_mandatory !!}</td>
                                    <td>{{ $subj->pass_mark }}</td>
                                    <td>{{ $subj->final_mark }}</td>
                                    <td>{{ $subj->point}}</td>
                                    <td>{{ $subj->Subject_author }}</td>
                                    <td>{{ $subj->Subject_code }}</td>
                                    <td>
                                        <a class="image-popup" href="{{ asset($subj->Subject_book_image) }}" ><img src="{{ asset($subj->Subject_book_image) }}" style="height: 80px;width: 80px" alt="" object-fit: cover; class="rounded">
                                        </a>
                                        
                                    </td>
                                    <td>{{ $subj->Is_for_graduation == 0 ? 'NO':'Yes' }}</td>
                                    <td>{{ $subj->is_main_subject == 0 ? 'NO':'Yes' }}</td>
                                    <td>{{ $subj->Is_optional == 0 ? 'NO':'Yes' }}</td>
                                    <td>{{ $subj->status == 0 ? 'Unpublished' : 'Published' }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($subj->note,8,'...') !!}</td>
                                    <td >
                                        <div class="d-flex">
                                            {{-- <a href="{{route('subject.show',$subj->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a> --}}
                                            <a href="{{ route('subjects.edit', $subj->slug) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('subjects.destroy', $subj->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Subject'); ">
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

