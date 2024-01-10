@extends('backend.master')

@section('title')
{{ isset($subject) ? 'Update' : 'Create' }} Subject
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Subject', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($subject) ? 'Update' : 'Create' }} Subject</h4>
                                <a href="{{ route('subjects.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                               
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($subject) ? route('subjects.update', $subject->id) : route('subjects.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($subject))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                            <div class="col-md-4 mb-4 ">
                                                <label  class="form-label">Educational Stage </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="SetEducational stage" data-bs-placement="right"></i>
                                                <select name="educational_stage_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select A Educational Stage</option>
                                                    @foreach($educationalStages as $educationalStage)
                                                        <option value="{{ $educationalStage->id }}" {{ $errors->any() ? (old('educational_stage_id')) :(isset($subject) && $subject->educational_stage_id == $educationalStage->id ? 'selected' : '')}}> {{ $educationalStage->group_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('educational_stage_id')<span class="text-danger f-s-12">{{ $errors->first('educational_stage_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">Student Group Name </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Student Group Name" data-bs-placement="right"></i>
                                                <select name="student_group_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select A Student Group Name</option>
                                                    @foreach($studentGroups as $studentGroup)
                                                        <option value="{{ $studentGroup->id }}" {{ $errors->any() ? (old('student_group_id')) : (isset($subject) && $subject->student_group_id == $studentGroup->id ? 'selected' : '')}}> {{ $studentGroup->group_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('student_group_id')<span class="text-danger f-s-12">{{ $errors->first('student_group_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4 ">
                                                <label  class="form-label">Academic Class </label>
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Class" data-bs-placement="right"></i>
                                                <select name="academic_class_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select A Academic Class</option>
                                                    @foreach($academicClasses as $academicClass)
                                                        <option value="{{ $academicClass->id }}" {{ $errors->any() ? (old('academic_class_id')) : (isset($subject) && $subject->academic_class_id == $academicClass->id ? 'selected' : '')}}> {{ $academicClass->class_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                            </div>

                                      
                                        
                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                   Subject Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="Subject_name" placeholder="" value="{{ $errors->any() ? old('Subject_name') : (isset($subject) ? $subject->Subject_name : '')}}">
                                                @error('Subject_name')<span class="text-danger f-s-12">{{ $errors->first('Subject_name') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Subject Type
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Type" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="subject_type__optional_mandatory" placeholder="" value="{{ $errors->any() ? old('subject_type__optional_mandatory') : (isset($subject) ? $subject->subject_type__optional_mandatory : '')}}">
                                                @error('subject_type__optional_mandatory')<span class="text-danger f-s-12">{{ $errors->first('subject_type__optional_mandatory') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Pass Mark
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Pass Mark" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="pass_mark" placeholder="" value="{{ $errors->any() ? old('pass_mark') : (isset($subject) ? $subject->pass_mark : '')}}">
                                                @error('pass_mark')<span class="text-danger f-s-12">{{ $errors->first('pass_mark') }}</span> @enderror
                                            </div>
                                        

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Final mark
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Final Mark" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="final_mark" placeholder="" value="{{ $errors->any() ? old('final_mark') : (isset($subject) ? $subject->final_mark : '')}}">
                                                @error('final_mark')<span class="text-danger f-s-12">{{ $errors->first('final_mark') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                   Point
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Point" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="point" placeholder="" value="{{ $errors->any() ? old('point') : (isset($subject) ? $subject->point : '')}}">
                                                @error('point')<span class="text-danger f-s-12">{{ $errors->first('point') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                  Subject Author
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Author" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="Subject_author" placeholder="" value="{{ $errors->any() ? old('Subject_author') : (isset($subject) ? $subject->Subject_author : '')}}">
                                                @error('Subject_author')<span class="text-danger f-s-12">{{ $errors->first('Subject_author') }}</span> @enderror
                                            </div>
                                        


                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                  Subject Code
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Code" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="Subject_code" placeholder="" value="{{ $errors->any() ? old('Subject_code') : (isset($subject) ? $subject->Subject_code : '')}}">
                                                @error('Subject_code')<span class="text-danger f-s-12">{{ $errors->first('Subject_code') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">
                                                    Image
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Image" data-bs-placement="right"></i>
                                                </label><br>
                                                <input type="file"  class="form-control" name="Subject_book_image" placeholder=""/>
                                                @if(isset($subject))
                                                    <img src="{{ asset($subject->Subject_book_image) }}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                            </div>

                                        
                                            <div class="col-md-6 mb-4">
                                                
                                                <div class="d-flex">
                                                    <label for="" class="me-3">
                                                        Is For Graduation
                                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Is For Graduation" data-bs-placement="right"></i><br>
                                                    </label>
                                                  
                                                     
                                                        <input type="checkbox" class="me-1" id="switch1"  data-switch="bool"  name="Is_for_graduation" {{ $errors->any() ? (old('status')) : (isset($subject) && $subject->Is_for_graduation == 0 ? '' : 'checked') }} >
                                                        <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                                                    @error('Is_for_graduation')<span class="text-danger f-s-12" >{{ $errors->first('Is_for_graduation') }}</span> @enderror
                                                </div>
                                            </div>
                                           

                                        

                                            
                                            <div class="col-md-6 mb-4">
                                                <div class="d-flex">
                                                    <label for="" class="me-3">
                                                        Is Main Subject
                                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Is Main Subject" data-bs-placement="right"></i><br>
                                                    </label>
                                                  
                                                     
                                                        <input type="checkbox" class="me-1" id="switch2"  data-switch="bool"  name="is_main_subject" {{ $errors->any() ? (old('status')) : (isset($subject) && $subject->is_main_subject == 0 ? '' : 'checked') }} >
                                                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                                    @error('is_main_subject')<span class="text-danger f-s-12" >{{ $errors->first('is_main_subject') }}</span> @enderror
                                                </div>
                                            </div>
                                        



                                            <div class="col-md-6 mb-4">
                                                <div class="d-flex">
                                                    <label for="" class="me-3">
                                                        Is Optional
                                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Is Optional" data-bs-placement="right"></i><br>
                                                    </label>
                                                  
                                                     
                                                        <input type="checkbox" class="me-1" id="switch4"  data-switch="bool"  name="Is_optional" {{ $errors->any() ? (old('status')) : (isset($subject) && $subject->Is_optional == 0 ? '' : 'checked') }} >
                                                        <label for="switch4" data-on-label="Yes" data-off-label="No"></label>
                                                    @error('Is_optional')<span class="text-danger f-s-12" >{{ $errors->first('Is_optional') }}</span> @enderror
                                                </div>
                                            </div>



                                            <div class="col-md-12 my-3">
                                                <label for="" class="form-label">
                                                    Note
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Note" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="note" id="editor" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('note')) : (isset($subject)? $subject->note : '') !!}</textarea>
                                                    @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span> @enderror
                                            </div>
                                        


                                            <div class="mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($subject) && $subject->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                       
                                        <div class="mt-5 text-center">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($subject) ? 'Update ' : 'Create ' }} Subject ">
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
