@extends('backend.master')

@section('title')
{{ isset($examQuestion) ? 'Update' : 'Create' }} Exam Question
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Question', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($examQuestion) ? 'Update' : 'Create' }} Exam Question</h4>
                                <a href="{{ route('exam_questions.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                               
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($examQuestion) ? route('exam_questions.update', $examQuestion->id) : route('exam_questions.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($examQuestion))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Academic Class Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Class Name" data-bs-placement="right"></i>
                                                <select name="academic_class_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Academic Class</option>
                                                    @foreach($academicClasses as $academicClass)
                                                        <option value="{{ $academicClass->id }}" {{ $errors->any() ? (old('academic_class_id')) : (isset($examQuestion) && $examQuestion->academic_class_id == $academicClass->id ? 'selected' : '')}}> {{ $academicClass->class_name }}</option>
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
                                                        <option value="{{ $section->id }}" {{$errors->any() ? (old('section_id')) : (isset($examQuestion) && $examQuestion->section_id == $examQuestion->id ? 'selected' : '')}}> {{ $section->section_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('section_id')<span class="text-danger f-s-12">{{ $errors->first('section_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Subject Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Name" data-bs-placement="right"></i>
                                                <select name="subject_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Subject</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{ $subject->id }}" {{$errors->any() ? (old('subject_id')) : (isset($examQuestion) && $examQuestion->subject_id == $subject->id ? 'selected' : '')}}> {{ $subject->Subject_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subject_id')<span class="text-danger f-s-12">{{ $errors->first('subject_id') }}</span> @enderror
                                            </div>


                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Academic Year Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Year Name" data-bs-placement="right"></i>
                                                <select name="academic_year_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Academic Year</option>
                                                    @foreach($academicYears as $academicYear)
                                                        <option value="{{ $academicYear->id }}" {{ $errors->any() ? (old('academic_year_id')) : (isset($examQuestion) && $examQuestion->academic_year_id == $academicYear->id ? 'selected' : '')}}> {{ $academicYear->session_year_start }} - {{ $academicYear->session_year_end }}</option>
                                                    @endforeach
                                                </select>
                                                @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Student Group Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Student Group Name" data-bs-placement="right"></i>
                                                <select name="student_group_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Student Group Name</option>
                                                    @foreach($studentGroups as $studentGroup)
                                                        <option value="{{ $studentGroup->id }}" {{ $errors->any() ? (old('student_group_id')) : (isset($examQuestion) && $examQuestion->student_group_id == $studentGroup->id ? 'selected' : '')}}> {{ $studentGroup->group_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('student_group_id')<span class="text-danger f-s-12">{{ $errors->first('student_group_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Exam</label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Exam" data-bs-placement="right"></i>
                                                <select name="exam_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Exam</option>
                                                    @foreach($exams as $exam)
                                                        <option value="{{ $exam->id }}" {{ $errors->any() ? (old('exam_id')) : (isset($examQuestion) && $examQuestion->exam_id == $exam->id ? 'selected' : '')}}> {{ $exam->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('exam_id')<span class="text-danger f-s-12">{{ $errors->first('exam_id') }}</span> @enderror
                                            </div>

                                           
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Parent</label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Parent" data-bs-placement="right"></i>
                                                <select name="parent_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Parent</option>
                                                    <option value="22" {{ $errors->any() ? (old('parent_id')) : (isset($examQuestion) ? 'selected' : '')}} >Parent</option>
                                                    {{-- @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->id}}" {{$errors->any() ? (old('teacher_id')) :(isset($examQuestion) && $examQuestion->teacher_id==$subject->id? 'selected':'')}}> {{$subject->teacher_name}}</option>
                                                    @endforeach --}}
                                                </select>
                                                @error('parent_id')<span class="text-danger f-s-12">{{ $errors->first('parent_id') }}</span> @enderror
                                            </div>

                                         </div>             
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($examQuestion) ? 'Update ' : 'Create ' }} examQuestion ">
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
