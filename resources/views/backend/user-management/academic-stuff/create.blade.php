@extends('backend.master')

@section('title')
{{isset($academicStuff) ?'Update':'Create'}} Academic Stuff
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Academic Stuff', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($academicStuff) ?'Update':'Create'}} Academic Stuff</h4>
                                <a href="{{ route('academic_stuff.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($academicStuff) ? route('academic_stuff.update', $academicStuff->id) : route('academic_stuff.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($academicStuff))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">
                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                     English Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your English Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="name_english" placeholder="" value="{{ $errors->any() ? old('name_english') : (isset($academicStuff)? $academicStuff->name_english :'')}}">
                                                @error('name_english')<span class="text-danger f-s-12">{{$errors->first('name_english')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Bangla Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Bangla Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="name_bangla" placeholder="" value="{{ $errors->any() ? old('name_bangla') : (isset($academicStuff)? $academicStuff->name_bangla :'')}}">
                                                @error('name_bangla')<span class="text-danger f-s-12">{{$errors->first('name_bangla')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label for="" class="form-label">
                                                    User Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your User Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="username" placeholder="" value="{{$errors->any() ? old('username') : (isset($academicStuff)? $academicStuff->username :'')}}">
                                                @error('username')<span class="text-danger f-s-12">{{$errors->first('username')}}</span> @enderror
                                            </div>
                                       


                                      
                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Email
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Email" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="email" placeholder="" value="{{ $errors->any() ? old('email') : (isset($academicStuff)? $academicStuff->email :'')}}">
                                                @error('email')<span class="text-danger f-s-12">{{$errors->first('email')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Phone
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Phone" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="phone" placeholder="" value="{{$errors->any() ? old('phone') : (isset($academicStuff)? $academicStuff->phone :'')}}">
                                                @error('phone')<span class="text-danger f-s-12">{{$errors->first('phone')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4" id="datepicker1">
                                                <label  class="form-label">
                                                    Date Of Birth
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Date Of Birth" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="dob" placeholder="" value="{{ $errors->any() ? old('dob') : (isset($academicStuff)? $academicStuff->dob :'')}}">
                                                @error('dob')<span class="text-danger f-s-12">{{$errors->first('dob')}}</span> @enderror
                                            </div>
                                        

                                  
                                        <div class="col-md-4 mb-4">
                                            <label  class="form-label">
                                                Gender
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Gender" data-bs-placement="right"></i>
                                            </label>
                                            <br/>
                                            <select name="gender" class="form-control"  data-placeholder="">
                                                <option value="" disabled selected>select a gender name</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @error('gender')<span class="text-danger f-s-12">{{$errors->first('gender')}}</span> @enderror
                                        </div>

                                        <div class="col-md-4 mb-4" id="datepicker1">
                                            <label  class="form-label">
                                                Joining Date
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Joining Date" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text" data-provide="datepicker" data-date-container="#datepicker1" class="form-control" name="jod" placeholder="" value="{{ $errors->any() ? old('jod') : (isset($academicStuff)? $academicStuff->jod :'')}}">
                                            @error('jod')<span class="text-danger f-s-12">{{$errors->first('jod')}}</span> @enderror
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <label  class="form-label">
                                               Religion
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your religion" data-bs-placement="right"></i>
                                            </label>
                                            <select name="religion" class="form-control"  data-placeholder="">
                                                <option value="" disabled selected>select a religion name</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hinduism">Hinduism</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @error('religion')<span class="text-danger f-s-12">{{$errors->first('religion')}}</span> @enderror
                                        </div>
                                    

                                    
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">
                                                Image
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Image" data-bs-placement="right"></i>
                                            </label>
                                            <br>
                                            <input type="file"  class="form-control-file" name="image" placeholder=""/>
                                            @if(isset($academicStuff))
                                                <img src="{{asset($academicStuff->image)}}" style="height: 100px;width: 100px" alt="">
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="" class="form-label">
                                                Address
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Address" data-bs-placement="right"></i>
                                            </label>
                                            <textarea name="address" id="editor" cols="20" rows="5" class="form-control" value="">{!!isset($academicStuff)? $academicStuff->address:''!!}</textarea>
                                                @error('address')<span class="text-danger f-s-12">{{$errors->first('address')}}</span> @enderror
                                            </div>
                                       


                                        
                                            <div class="col-md-4 mb-4">
                                                <label for="" class="form-label">
                                                   Highest Education
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Highest Education" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="highest_education" placeholder="" value="{{$errors->any() ? old('highest_education') : (isset($academicStuff)? $academicStuff->highest_education :'')}}">
                                                @error('highest_education')<span class="text-danger f-s-12">{{$errors->first('highest_education')}}</span> @enderror

                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                     Designation
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Designation" data-bs-placement="right"></i>
                                                </label>
                                                <br/>
                                                <select name="designation_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a designation name</option>
                                                    <option value="1">aaaaaaa</option>

                                                </select>
                                                @error('designation_id')<span class="text-danger f-s-12">{{$errors->first('designation_id')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                           <label for="" class="col-md-4">
                                            Status
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i>
                                        </label>
                                           <br/>
                                                <label for="" class="mt-2 me-2"> <input type="radio" class="me-1" name="status" value="1" @if(isset($academicStuff)) {{$academicStuff->status == 1 ?'checked':''}} @endif>Published</label>
                                                <label for=""class="mt-2"> <input type="radio" class="me-1"  name="status" value="0" @if(isset($academicStuff)) {{$academicStuff->status == 0 ?'checked':''}} @endif>UnPublished</label>
                                            </div>
                                        </div>

                                        <div class=" form-group row mt-3">
                                            <label for="" class="col-md-4">
                                            </label>
                                            <div class="col-md-4">
                                                <input type="submit" value="{{isset($academicStaff)?'Update Academic Staff':'Add Academic Staff'}}" class="btn btn-success">
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
