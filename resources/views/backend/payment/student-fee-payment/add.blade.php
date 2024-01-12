@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - {{ isset($studentFeePayment) ? "Update" : 'Create' }} Student Fee Payment
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Student Fee Payment', 'child' =>  isset($studentFeePayment) ? "Update" : 'Create',])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($studentFeePayment) ? 'Update' : 'Create' }} Student Fee Type</h4>
                    <a href="{{ route('student_fee_payments.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        @if(!empty($errors))
                            <ul>
                                @foreach($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{isset($studentFeeType) ? route('student_fee_payments.update', $studentFeePayment->id) : route('student_fee_payments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($studentFeePayment))
                                @method('put')
                            @endif

                            <div class="form-group row">
                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Student Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Student Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="student_id" class="form-control select2" data-toggle="select2" data-placeholder="select a Student">
                                        <option value=""></option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}" {{ isset($studentFeePayment) && $studentFeePayment->student_id == $student->id ? 'selected' : '' }}>{{ $student->name_english.' ('.$student->name_bangla.')' }}</option>
                                        @endforeach
                                    </select>
                                    @error('student_id')<span class="text-danger f-s-12">{{$errors->first('student_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Class
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Class" data-bs-placement="right"></i>
                                    </label>
                                    <select name="academic_class_id" id="selectClass" class="form-control select2" data-toggle="select2" data-placeholder="select a Class">
                                        <option value=""></option>
                                        @foreach($academicClasses as $academicClass)
                                            <option value="{{ $academicClass->id }}" data-class_numeric="{{ $academicClass->class_numeric }}" {{ isset($studentFeePayment) && $studentFeePayment->academic_class_id == $academicClass->id ? 'selected' : '' }}>{{ $academicClass->class_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_class_id')<span class="text-danger f-s-12">{{$errors->first('academic_class_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Section
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Section" data-bs-placement="right"></i>
                                    </label>
                                    <select name="section_id" class="form-control select2" data-toggle="select2" data-placeholder="select a Section">
                                        <option value=""></option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{ isset($studentFeePayment) && $studentFeePayment->section_id == $section->id ? 'selected' : '' }}>{{ $section->section_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')<span class="text-danger f-s-12">{{$errors->first('section_id')}}</span> @enderror
                                </div>
                            </div>










                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Religion
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select teacher's religion" data-bs-placement="right"></i>
                                    </label>
                                    <select name="religion" class="form-control select2" data-toggle="select2" data-placeholder="select a religion name">
                                        <option value=""></option>
                                        <option value="Islam" {{ isset($student) && $student->religion == 'Islam' ? 'selected'  :'' }}>Islam</option>
                                        <option value="Hinduism" {{ isset($student) && $student->religion == 'Hinduism' ? 'selected'  :'' }}>Hinduism</option>
                                        <option value="Buddhism" {{ isset($student) && $student->religion == 'Buddhism' ? 'selected'  :'' }}>Buddhism</option>
                                        <option value="Christianity" {{ isset($student) && $student->religion == 'Christianity' ? 'selected'  :'' }}>Christianity</option>
                                        <option value="Other" {{ isset($student) && $student->religion == 'Other' ? 'selected'  :'' }}>Other</option>
                                    </select>
                                    @error('religion')<span class="text-danger f-s-12">{{$errors->first('religion')}}</span> @enderror
                                </div>


                            

                                <div class="col-md-4 mt-2">
                                    <label for="" class="">
                                        Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Teacher Publication Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch3" name="status" {{ isset($student) && $student->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
{{--                                    <label for="" class="mt-2"> <input type="radio" name="status" value="1" @if(isset($academicStuff)) {{$academicStuff->status == 1 ?'checked':''}} @endif>Published</label>--}}
{{--                                    <label for="" class="mt-2"> <input type="radio"  name="status" value="0" @if(isset($academicStuff)) {{$academicStuff->status == 0 ?'checked':''}} @endif>UnPublished</label>--}}
                                </div>
                            </div>

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($student)?'Update':'Add'}} Student" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="callout callout-danger mt-2">
                        <p>
                            <b>Note: </b>
                            <span class="text-danger">* </span> fields are required
                        </p>
                        <p>
                            <b>Note: </b>
                            Create Students,Academic Year, Academic Class, Sections, Fee Types before create a new Student Fee Payment.
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

