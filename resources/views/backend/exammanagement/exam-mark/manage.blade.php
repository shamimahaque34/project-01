@extends('backend.master')

@section('title')
   Exam Mark
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Mark', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam Mark</h4>
                    <a href="{{ route('exam_marks.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Academic Class Name</th>
                                <th>Section Name</th>
                                <th>Student </th>
                                <th>Exam Name</th>
                                <th>Mark</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($examMarks as $examMark)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $examMark->academicClass->class_name ?? '' }}
                                    <td>{{ $examMark->section->section_name ?? '' }}</td>
                                    <td>{{ $examMark->student_id }}</td>
                                    <td>{{ $examMark->exam->title ?? '' }}</td>
                                    <td>{{ $examMark->mark }}</td>

                                    <td>
                                     <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('exam_marks.edit',$examMark->id) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('exam_marks.destroy',$examMark->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Mark'); ">
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

