@extends('backend.master')

@section('title')
{{isset($student) ?'Update':'Create'}} Student
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Student', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($student) ?'Update':'Create'}} Student</h4>
                                <a href="{{ route('user_management_student.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($student) ? route('user_management_student.update', $student->id) : route('user_management_student.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($student))
                                            @method('put')
                                        @endif

                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Parent Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Parent Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="parent_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a parent name</option>
                                                    <option value="">aaaaaa</option>
                                                </select>
                                                @error('parent_id')<span class="text-danger f-s-12">{{$errors->first('parent_id')}}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Section Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Section Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="section_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a section name</option>
                                                    <option value="">aaaaaa</option>
                                                </select>
                                                @error('section_id')<span class="text-danger f-s-12">{{$errors->first('section_id')}}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                   Student Group Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Student Group Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="student_group_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a student group name</option>
                                                    <option value="">aaaaaa</option>
                                                </select>
                                                @error('student_group_id')<span class="text-danger f-s-12">{{$errors->first('student_group_id')}}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Main Subject Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Main Subject Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="main_subject_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a main subject name</option>
                                                    <option value="">aaaaaa</option>
                                                </select>
                                                @error('main_subject_id')<span class="text-danger f-s-12">{{$errors->first('main_subject_id')}}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Optional Subject Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Optional Subject Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="optional_subject_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a optional subject name</option>
                                                    <option value="">aaaaaa</option>
                                                </select>
                                                @error('optional_subject_id')<span class="text-danger f-s-12">{{$errors->first('optional_subject_id')}}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                   Academic Class Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Class Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="academic_class_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a academic class name</option>
                                                    <option value="">aaaaaa</option>
                                                </select>
                                                @error('academic_class_id')<span class="text-danger f-s-12">{{$errors->first('academic_class_id')}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                     English Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your English Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="name_english" placeholder="" value="{{ $errors->any() ? old('name_english') : (isset($student)? $student->name_english :'')}}">
                                                @error('name_english')<span class="text-danger f-s-12">{{$errors->first('name_english')}}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Bangla Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Bangla Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="name_bangla" placeholder="" value="{{ $errors->any() ? old('name_bangla') : (isset($student)? $student->name_bangla :'')}}">
                                                @error('name_bangla')<span class="text-danger f-s-12">{{$errors->first('name_bangla')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    User Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your User Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="username" placeholder="" value="{{$errors->any() ? old('username') : (isset($student)? $student->username :'')}}">
                                                @error('username')<span class="text-danger f-s-12">{{$errors->first('username')}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Email
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Email" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="email" placeholder="" value="{{ $errors->any() ? old('email') : (isset($student)? $student->email :'')}}">
                                                @error('email')<span class="text-danger f-s-12">{{$errors->first('email')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Phone
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Phone" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="phone" placeholder="" value="{{$errors->any() ? old('phone') : (isset($student)? $student->phone :'')}}">
                                                @error('phone')<span class="text-danger f-s-12">{{$errors->first('phone')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4" id="datepicker1">
                                                <label  class="form-label">
                                                    Date Of Birth
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Date Of Birth" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="dob" placeholder="" value="{{ $errors->any() ? old('dob') : (isset($student)? $student->dob :'')}}">
                                                @error('dob')<span class="text-danger f-s-12">{{$errors->first('dob')}}</span> @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row mt-2">

                                             <div class="col-md-4">
                                                 <label  class="form-label">
                                                    Gender
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Gender" data-bs-placement="right"></i>
                                                </label>
                                                <br/>
                                                <select name="gender" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a gender name</option>
                                                    <option value="">Male</option>
                                                    <option value="">Female</option>
                                                    <option value="">Other</option>
                                                </select>
                                                @error('gender')<span class="text-danger f-s-12">{{$errors->first('gender')}}</span> @enderror
                                            </div>

                                             <div class="col-md-4">
                                                <label  class="form-label">
                                                   Blood Group
                                                   <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Blood Group" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="blood_group" placeholder="" value="{{$errors->any() ? old('blood_group') : (isset($student)? $student->blood_group :'')}}">
                                                @error('blood_group')<span class="text-danger f-s-12">{{$errors->first('blood_group')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Registration Number
                                                  <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Registration Number" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="registration_no" placeholder="" value="{{ $errors->any() ? old('registration_no') : (isset($student)? $student->registration_no :'')}}">
                                                @error('registration_no')<span class="text-danger f-s-12">{{$errors->first('registration_no')}}</span> @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row mt-2">


                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                   Roll No
                                                   <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Roll No" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="roll_no" placeholder="" value="{{ $errors->any() ? old('roll_no') : (isset($student)? $student->roll_no :'')}}">
                                                @error('roll_no')<span class="text-danger f-s-12">{{$errors->first('roll_no')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                   Religion
                                                   <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your religion" data-bs-placement="right"></i>
                                                </label>
                                                <select name="religion" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a religion name</option>
                                                    <option value="">Islam</option>
                                                    <option value="">Hinduism</option>
                                                    <option value="">Buddhism</option>
                                                    <option value="">Christianity</option>
                                                    <option value="">Other</option>
                                                </select>                                                @error('religion')<span class="text-danger f-s-12">{{$errors->first('religion')}}</span> @enderror
                                            </div>


                                            <div class="col-md-4">
                                                <label for="" class="form-label">
                                                   Division
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Division" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="division" placeholder="" value="{{$errors->any() ? old('division') : (isset($student)? $student->division :'')}}">
                                                @error('division')<span class="text-danger f-s-12">{{$errors->first('division')}}</span> @enderror

                                            </div>

                                        </div>

                                       <div class="form-group row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">
                                                    Image
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Image" data-bs-placement="right"></i>
                                                </label><br>
                                                <input type="file"  class="form-control-file" name="image" placeholder=""/>
                                                @if(isset($student))
                                                    <img src="{{asset($student->image)}}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label for="" class="form-label">
                                                    Address
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Address" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="address" id="editor" cols="20" rows="5" class="form-control" value="">{!!isset($student)? $student->address:''!!}</textarea>
                                                 @error('address')<span class="text-danger f-s-12">{{$errors->first('address')}}</span> @enderror
                                                </div>
                                        </div>

                                        <div class=" form-group row mt-3">

                                            <div class="col-md-4">
                                                <label for="" class="form-label">
                                                   District
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your District" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="district" placeholder="" value="{{$errors->any() ? old('district') : (isset($student)? $student->district :'')}}">
                                                @error('district')<span class="text-danger f-s-12">{{$errors->first('district')}}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="col-md-4">
                                                     Status
                                                     <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i>
                                                 </label>
                                                <br/>
                                                     <label for="" class="mt-2"> <input type="radio" name="status" value="1" @if(isset($student)) {{$student->status == 1 ?'checked':''}} @endif>Published</label>
                                                     <label for=""class="mt-2"> <input type="radio"  name="status" value="0" @if(isset($student)) {{$student->status == 0 ?'checked':''}} @endif>UnPublished</label>
                                                 </div>
                                        </div>

                                        <div class=" form-group row mt-3">
                                            <label for="" class="col-md-4">
                                            </label>
                                            <div class="col-md-4">
                                                <input type="submit" value="{{isset($student)?'Update Student':'Add Student'}}" class="btn btn-success">
                                            </div>
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

    @section('script')
    <script>
        CKEDITOR.replace('editor');
    </script>
    @endsection

@endsection
