@extends('backend.master')

@section('title')
    Associate Exam Question
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Associate Exam Question', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage associateExamQuestion</h4>
                    <a href="{{ route('associate_exam_questions.create') }}" class="btn btn-success float-end">
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
                                <th>Exam Question</th>
                                <th>Exam</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($associateExamQuestions as $associateExamQuestion)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $associateExamQuestion->examQuestion->id }}</td>
                                    <td>{{ $associateExamQuestion->question->id}}</td>
                                    <td>
                                   
                                        <div class="d-flex">
                                        <a href="{{ route('associate_exam_questions.edit', $associateExamQuestion->id) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('associate_exam_questions.destroy', $associateExamQuestion->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Associate Exam Question'); ">
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

