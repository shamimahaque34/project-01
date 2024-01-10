@extends('backend.master')

@section('title')
{{ isset($ExamAttendance) ? 'Update' : 'Create' }} Exam Attendance
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Attendance', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($ExamAttendance) ? 'Update' : 'Create' }} Exam Attendance</h4>
                                <a href="{{ route('exam_attendance.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($ExamAttendance) ? route('exam_attendance.update', $ExamAttendance->id) : route('exam_attendance.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($ExamAttendance))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                            <div class="col-md-6 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Exam Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="exam_id" class="select1 form-control" data-toggle="select1" data-placeholder="Choose ...">
                                                    <option value="">Select A Exam Name</option>
                                                    @foreach($exams as $exam)
                                                       <option value="{{ $exam->id }}" {{ $errors->any() && old('exam_id') == $exam->id ? ('selected') : (isset($ExamAttendance) && $ExamAttendance->exam_id == $exam->id ? 'selected' : '') }}> {{$exam->title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('exam_id')<span class="text-danger f-s-12">{{ $errors->first('exam_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Exam Schedule
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Schedule" data-bs-placement="right"></i>
                                                </label>
                                                <select name="exam_schedule_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select A Exam Schedule</option>
                                                    @foreach($schedules as $schedule)
                                                        <option value="{{ $schedule->id }}" {{ $errors->any() && old('exam_schedule_id') == $schedule->id ? ('selected'):(isset($ExamAttendance) && $ExamAttendance->exam_schedule_id == $schedule->id ? 'selected' : '') }}> {{ $schedule->start_time }}</option>
                                                    @endforeach
                                                </select>
                                                @error('exam_schedule_id')<span class="text-danger f-s-12">{{ $errors->first('exam_schedule_id') }}</span> @enderror
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Student
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Student" data-bs-placement="right"></i>
                                                </label>
                                                <select name="student_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select a Student</option>
                                                    <option value="1"{{ $errors->any() ? ('selected' ) : (isset($ExamAttendance) && $ExamAttendance->student_id == 1 ? 'selected' : '') }}>ss</option>
                                                    {{--                                                    @foreach($classes as $class)--}}
                                                    {{--                                                        <option value="{{$errors->any()? old('hostel_type'): $class->id}}" {{isset($ExamAttendance) && $ExamAttendance->hostel_type?'selected':''}}> {{$class->hostel_type}}</option>--}}
                                                    {{--                                                    @endforeach--}}
                                                </select>
                                                @error('student_id')<span class="text-danger f-s-12">{{ $errors->first('student_id') }}</span> @enderror
                                            </div>
                                       

                                        
                                            <div class="col-md-6 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Section
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Section" data-bs-placement="right"></i>
                                                </label>
                                                <select name="section_id" class="select form-control" data-toggle="select"  data-placeholder="Choose ...">
                                                    <option value="">Select A Section</option>
                                                    @foreach($sections as  $section)
                                                        <option value="{{ $section->id }}" {{ $errors->any() && old('section_id') == $section->id ? ('selected') : (isset($ExamAttendance) && $ExamAttendance->section_id == $section->id ? 'selected' : '') }}> {{ $section->section_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('section_id')<span class="text-danger f-s-12">{{ $errors->first('section_id') }}</span> @enderror
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Academic Class Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Class Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="academic_class_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                        <option value="">Select A Academic Class Name</option>
                                                        @foreach($academicClasses as  $academicClass)
                                                            <option value="{{ $academicClass->id }}" {{ $errors->any() && old('academic_class_id') == $academicClass->id ? ('selected') : (isset($ExamAttendance) && $ExamAttendance->academic_class_id == $academicClass->id ?  'selected' : '')}}> {{ $academicClass->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4" id="datepicker1">
                                                <label  class="form-label">
                                                     Date
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Date " data-bs-placement="right"></i>
                                                </label>
                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="date" placeholder="" value="{{ $errors->any() ? old('date') : (isset($ExamAttendance) ? $ExamAttendance->date : '') }}">
                                                @error('date')<span class="text-danger f-s-12">{{ $errors->first('date') }}</span> @enderror
                                            </div>

                                        </div>

                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{ isset($ExamAttendance) ? 'Update' : 'Add ' }} Exam Attendance" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
