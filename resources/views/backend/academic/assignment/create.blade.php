@extends('backend.master')

@section('title')
{{ isset($assignment) ? 'Update' : 'Create' }} Assignment
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Assignment', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($assignment) ? 'Update' : 'Create' }} Assignment</h4>
                                <a href="{{ route('assignments.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                               
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($assignment) ? route('assignments.update', $assignment->id) : route('assignments.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($assignment))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Subject Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Name" data-bs-placement="right"></i>
                                                <select name="subject_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Subject</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{ $subject->id }}" {{ $errors->any() ? (old('subject_id')) : (isset($assignment) && $assignment->subject_id == $subject->id ? 'selected' : '')}}> {{$subject->Subject_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('subject_id')<span class="text-danger f-s-12">{{$errors->first('subject_id')}}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">Academic Class Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Class Name" data-bs-placement="right"></i>
                                                <select name="academic_class_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select a Academic Class</option>
                                                    @foreach($academicClasses as $academicClass)
                                                        <option value="{{ $academicClass->id }}" {{ $errors->any() ? (old('academic_class_id')) :(isset($assignment) && $assignment->academic_class_id == $academicClass->id ? 'selected' : '')}}> {{ $academicClass->class_name }}</option>
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
                                                        <option value="{{ $section->id }}" {{ $errors->any() ? (old('section_id')) : (isset($assignment) && $assignment->section_id == $section->id ? 'selected' : '')}}> {{$section->section_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('section_id')<span class="text-danger f-s-12">{{ $errors->first('section_id') }}</span> @enderror
                                            </div>
                                           
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                   Title
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Title" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="title" placeholder="" value="{{ $errors->any() ? old('title') : (isset($assignment) ? $assignment->title : '')}}">
                                                @error('title')<span class="text-danger f-s-12">{{ $errors->first('title') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">
                                                    File
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your File" data-bs-placement="right"></i>
                                                </label><br>
                                                <input type="file"  class="form-control" name="file" placeholder=""value="{{ $errors->any() ? old('file') : (isset($assignment) ? $assignment->file : '')}}"/>
                                                @error('file')<span class="text-danger f-s-12">{{ $errors->first('file') }}</span> @enderror
                                                
                                            </div>

                                            <div class="col-md-6 mb-4" id="datepicker1">
                                                <label  class="form-label">
                                                   Deadline
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Deadline" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="deadline" placeholder="" value="{{ $errors->any() ? old('deadline') : (isset($assignment) ? $assignment->deadline : '') }}">
                                                @error('deadline')<span class="text-danger f-s-12">{{$errors->first('deadline')}}</span> @enderror
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <label for="" class="form-label">
                                                    Description
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Description" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="description" id="editor" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('description')) : (isset($assignment) ? $assignment->description : '')!!}</textarea>
                                                @error('description')<span class="text-danger f-s-12">{{ $errors->first('description') }}</span> @enderror
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <label for="" class="form-label">
                                                    Note
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Note" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="note" id="editor1" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('note')) : (isset($assignment) ? $assignment->note : '')!!}</textarea>
                                                @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span> @enderror
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($assignment) && $assignment->status == 0 ? '' : 'checked')}} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                        </div> 
                                    </div>
                                                  
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($assignment) ? 'Update ' : 'Create ' }} Assignment ">
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
