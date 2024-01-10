@extends('backend.master')

@section('title')
    Create User Submitted Certificate
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'User Submitted Certificate', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($userSubmittedCertificate) ?'Update':'Create'}} User Submitted Certificate</h4>
                                <a href="{{ route('user_submitted_certificate.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($userSubmittedCertificate) ? route('user_submitted_certificate.update', $userSubmittedCertificate->id) : route('user_submitted_certificate.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($userSubmittedCertificate))
                                            @method('put')
                                        @endif

                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                     File
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your File" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="file" placeholder="" value="{{ $errors->any() ? old('file') : (isset($userSubmittedCertificate)? $userSubmittedCertificate->file :'')}}">
                                                @error('file')<span class="text-danger f-s-12">{{$errors->first('file')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                     File Type
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your File Type" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="file_type" placeholder="" value="{{ $errors->any() ? old('file_type') : (isset($userSubmittedCertificate)? $userSubmittedCertificate->file_type :'')}}">
                                                @error('file_type')<span class="text-danger f-s-12">{{$errors->first('file_type')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                   User Submitted Certificateable Name
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Student User Submitted Certificateable Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="user_submitted_certificateable_id" class="form-control"  data-placeholder="">
                                                    <option value="" disabled selected>select a student group name</option>
                                                    <option value="">aaaaaa</option>
                                                </select>
                                                @error('user_submitted_certificateable_id')<span class="text-danger f-s-12">{{$errors->first('user_submitted_certificateable_id')}}</span> @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    User Submitted Certificateable Type
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your User Submitted Certificateable Type" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="user_submitted_certificateable_type" placeholder="" value="{{ $errors->any() ? old('user_submitted_certificateable_type') : (isset($userSubmittedCertificate)? $userSubmittedCertificate->name_english :'')}}">
                                                @error('user_submitted_certificateable_type')<span class="text-danger f-s-12">{{$errors->first('user_submitted_certificateable_type')}}</span> @enderror
                                            </div>
                                        </div>





                                        <div class=" form-group row mt-3">
                                            <label for="" class="col-md-4">
                                            </label>
                                            <div class="col-md-4">
                                                <input type="submit" value="{{isset($userSubmittedCertificate)?'Update User Submitted Certificate':'Add User Submitted Certificate'}}" class="btn btn-success">
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
