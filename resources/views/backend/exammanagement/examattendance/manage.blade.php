@extends('backend.master')

@section('title')
    Exam Attendance
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'exam_attendance', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam Attendence</h4>
                    <a href="{{ route('exam_attendance.create') }}" class="btn btn-success float-end">
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
                                <th>Exam</th>
                                <th>Exam Schedule</th>
                                <th>Student Name</th>
                                <th>Section Name</th>
                                <th>Accademic Class</th>
                                <th>Date</th>
{{--                                <th>Is Present</th>--}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attendance as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->exam->title}}</td>
                                    <td>{{ $exam->examSchedule->exam_date }}</td>
                                    <td>{{ $exam->student_id }}</td>
                                    <td>{{ $exam->section->section_name }}</td>
                                    <td>{{ $exam->academicClass->class_name }}</td>
                                    <td>{{ $exam->date }}</td>
{{--                                    <td>{{ $exam->is_present }}</td>--}}
                                    <td>{{ $exam->status==0? 'Unpublished':'Publishid'}}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$exam->id)}}" class="btn btn-{{$exam->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$exam->status==0? 'down':'up'}}"></i></a>--}}
                                        <div class="d-flex">
                                        <a href="{{ route('exam_attendance.edit', $exam->id) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('exam_attendance.destroy', $exam->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Attendence'); ">
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

