@extends('backend.master')

@section('title')
    Create Admin
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Admin', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($admin) ?'Update':'Create'}} Admin</h4>
                                <a href="{{ route('user_admin.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($admin) ? route('user_admin.update', $admin->id) : route('user_admin.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($admin))
                                            @method('put')
                                        @endif
                                        <div class="form-group row mt-2">


                                            <div class="col-md-6  ">
                                                <label for="disabledTextInput" class="form-label">
                                                     English Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your English Name" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="name_english" placeholder="" value="{{ $errors->any() ? old('name_english') : (isset($admin)? $admin->name_english :'')}}">
                                                @error('name_english')<span class="text-danger f-s-12">{{$errors->first('name_english')}}</span> @enderror

                                            </div>


                                            <div class="col-md-6 ">
                                                <label  class="form-label">
                                                    Bangla Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Bangla Name" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="name_bangla" placeholder="" value="{{ $errors->any() ? old('name_bangla') : (isset($admin)? $admin->name_bangla :'')}}">
                                                @error('name_bangla')<span class="text-danger f-s-12">{{$errors->first('name_bangla')}}</span> @enderror

                                            </div>


                                        </div>
                                        <div class="form-group row mt-2">



                                            <div class="col-md-6  ">
                                                <label for="" class="form-label">
                                                    User Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your User Name" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="username" placeholder="" value="{{$errors->any() ? old('username') : (isset($admin)? $admin->username :'')}}">
                                                @error('username')<span class="text-danger f-s-12">{{$errors->first('username')}}</span> @enderror

                                            </div>


                                            <div class="col-md-6  ">
                                                <label for="disabledTextInput" class="form-label">
                                                    Email
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Email" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="email" placeholder="" value="{{ $errors->any() ? old('email') : (isset($admin)? $admin->email :'')}}">
                                                @error('email')<span class="text-danger f-s-12">{{$errors->first('email')}}</span> @enderror

                                            </div>

                                        </div>
                                        <div class="form-group row mt-2">




                                            <div class="col-md-6 ">
                                                <label  class="form-label">
                                                    Phone
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Phone" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="phone" placeholder="" value="{{$errors->any() ? old('phone') : (isset($admin)? $admin->phone :'')}}">
                                                @error('phone')<span class="text-danger f-s-12">{{$errors->first('phone')}}</span> @enderror

                                            </div>


                                            <div class="col-md-6 ">
                                                <label  class="form-label">
                                                    Date Of Birth
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Date Of Birth" data-bs-placement="right"></i>
                                                </label>
                                                <input type="date"  class="form-control" name="dob" placeholder="" value="{{ $errors->any() ? old('dob') : (isset($admin)? $admin->dob :'')}}">
                                                @error('dob')<span class="text-danger f-s-12">{{$errors->first('dob')}}</span> @enderror
                                            </div>


                                        </div>

                                        <div class="form-group row mt-2">



                                            <div class="col-md-6 ">
                                                <label  class="form-label">
                                                    Date Of Birth Timestamp
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Date Of Birth Timestamp" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="dob_timestamp" placeholder="" value="{{ $errors->any() ? old('dob_timestamp') : (isset($admin)? $admin->dob_timestamp :'')}}">
                                                @error('dob_timestamp')<span class="text-danger f-s-12">{{$errors->first('dob_timestamp')}}</span> @enderror
                                            </div>


                                        <div class="col-md-6 ">
                                            <label  class="form-label">
                                                Gender
                                                <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Gender" data-bs-placement="right"></i>
                                            </label>
                                            <br/>
                                            <label for=""> <input type="radio" name="gender" value = "0" @if(isset($admin)) {{$admin->status == 0 ?'checked':''}} @endif>Male</label>
                                            <label for=""> <input type="radio" name="gender" value = "1" @if(isset($admin)) {{$admin->status == 1 ?'checked':''}} @endif>Female</label>
                                            <label for=""> <input type="radio" name="gender" value = "2" @if(isset($admin)) {{$admin->status == 2 ?'checked':''}} @endif>Other</label>

                                            @error('gender')<span class="text-danger f-s-12">{{$errors->first('gender')}}</span> @enderror
                                        </div>
                                    </div>

                                        <div class="form-group row mt-2">



                                            <div class="col-md-6 ">
                                                <label  class="form-label">
                                                   Religion
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your religion" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="religion" placeholder="" value="{{ $errors->any() ? old('religion') : (isset($admin)? $admin->religion :'')}}">
                                                @error('religion')<span class="text-danger f-s-12">{{$errors->first('religion')}}</span> @enderror
                                            </div>


                                            <div class="col-md-6 ">
                                                <label class="form-label">
                                                    Image
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Image" data-bs-placement="right"></i>

                                                    </label><br>
                                                <input type="file"  class="form-control-file" name="image" placeholder=""/>
                                                @if(isset($admin))
                                                    <img src="{{asset($admin->image)}}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row mt-2">
                                            <div class="col-md-12  ">
                                                <label for="" class="form-label">
                                                    Address
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Address" data-bs-placement="right"></i>

                                                </label>

                                                    <textarea name="address" id="editor" cols="20" rows="5" class="form-control" value="">{!!isset($admin)? $admin->address:''!!}</textarea>
                                                    @error('address')<span class="text-danger f-s-12">{{$errors->first('address')}}</span> @enderror

                                                </div>
                                              </div>

                                        <div class=" form-group row mt-3">

                                           <label for="" class="col-md-4">Status</label>
                                            <div class="col-md-8">
                                                <label for=""> <input type="radio" name="status" value="1" @if(isset($admin)) {{$admin->status == 1 ?'checked':''}} @endif>Published</label>
                                                <label for=""> <input type="radio"  name="status" value="0" @if(isset($admin)) {{$admin->status == 0 ?'checked':''}} @endif>UnPublished</label>
                                            </div>
                                        </div>

                                        <div class=" form-group row mt-3">
                                            <label for="" class="col-md-4">
                                            </label>
                                            <div class="col-md-4">
                                                <input type="submit" value="{{isset($admin)?'Update Admin':'Add Admin'}}" class="btn btn-success">
                                            </div>
                                        </div>




                                        {{-- <div class="mb-3 float-end">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($subject) ? 'Update ' : 'Create ' }} subject">
                                        </div> --}}
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
