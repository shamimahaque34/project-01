@extends('backend.master')

@section('title')
{{ isset($examMark) ? 'Update' : 'Create' }} Exam Mark
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Mark', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($examMark) ? 'Update' : 'Create' }} Exam Mark</h4>
                                <a href="{{ route('exam_marks.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                               
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($examMark) ? route('exam_marks.update', $examMark->id) : route('exam_marks.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($examMark))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Academic Class Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Class Name" data-bs-placement="right"></i>
                                                <select name="academic_class_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Academic Class</option>
                                                    @foreach($academicClasses as $academicClass)
                                                        <option value="{{ $academicClass->id }}" {{ $errors->any() ? (old('academic_class_id')) : (isset($examMark) && $examMark->academic_class_id == $academicClass->id ? 'selected' : '')}}> {{ $academicClass->class_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Section Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Section Name" data-bs-placement="right"></i>
                                                <select name="section_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Section</option>
                                                    @foreach($sections as $section)
                                                        <option value="{{ $section->id }}" {{$errors->any() ? (old('section_id')) : (isset($examMark) && $examMark->section_id == $examMark->id ? 'selected' : '')}}> {{ $section->section_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('section_id')<span class="text-danger f-s-12">{{ $errors->first('section_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Exam</label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Exam" data-bs-placement="right"></i>
                                                <select name="exam_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Exam</option>
                                                    @foreach($exams as $exam)
                                                        <option value="{{ $exam->id }}" {{ $errors->any() ? (old('exam_id')) : (isset($examMark) && $examMark->exam_id == $exam->id ? 'selected' : '')}}> {{ $exam->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('exam_id')<span class="text-danger f-s-12">{{ $errors->first('exam_id') }}</span> @enderror
                                            </div>

                                           
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Student</label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Student" data-bs-placement="right"></i>
                                                <select name="student_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Student</option>
                                                    <option value="22" {{ $errors->any() ? (old('student_id')) : (isset($examMark) ? 'selected' : '')}} >Student</option>
                                                    {{-- @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->id}}" {{$errors->any() ? (old('teacher_id')) :(isset($examMark) && $examMark->teacher_id==$subject->id? 'selected':'')}}> {{$subject->teacher_name}}</option>
                                                    @endforeach --}}
                                                </select>
                                                @error('student_id')<span class="text-danger f-s-12">{{ $errors->first('student_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label  class="form-label">
                                                    Mark
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Mark" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="mark" placeholder="" value="{{ $errors->any() ? old('title') : (isset($examMark) ? $examMark->mark : '') }}">
                                                @error('mark')<span class="text-danger f-s-12">{{ $errors->first('mark') }}</span> @enderror
                                            </div>

                                         </div>             
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($examMark) ? 'Update ' : 'Create ' }} examMark ">
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
