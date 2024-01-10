@extends('backend.master')

@section('title')
   Exam Question
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Question', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam Question</h4>
                    <a href="{{ route('exam_questions.create') }}" class="btn btn-success float-end">
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
                                <th>Subject Name</th>
                                <th>Academic Year Name</th>
                                <th>Student Group Name</th>
                                <th>Exam Name</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($examQuestions as $examQuestion)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $examQuestion->academicClass->class_name ?? '' }}
                                    <td>{{ $examQuestion->section->section_name ?? '' }}</td>
                                    <td>{{ $examQuestion->subject->Subject_name ?? '' }}</td>
                                    <td>{{ $examQuestion->academicYear->session_year_start ?? '' }}</td>
                                    <td>{{ $examQuestion->studentGroup->group_name ?? '' }}</td>
                                    <td>{{ $examQuestion->exam->title ?? '' }}</td>
                                    <td>{{ $examQuestion->parent_id }}</td>
                                    <td>
                                     <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('exam_questions.edit',$examQuestion->id) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('exam_questions.destroy',$examQuestion->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Question'); ">
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

