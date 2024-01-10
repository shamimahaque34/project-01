@extends('backend.master')

@section('title')
    Create Designation
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Designation', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($designation) ?'Update':'Create'}} Designation</h4>
                                <a href="{{ route('designation.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($designation) ? route('designation.update', $designation->id) : route('designation.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($designation))
                                            @method('put')
                                        @endif
                                        <div class="form-group row mt-2">


                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                     Title
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Title" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="title" placeholder="" value="{{ $errors->any() ? old('title') : (isset($designation)? $designation->title :'')}}">
                                                @error('title')<span class="text-danger f-s-12">{{$errors->first('title')}}</span> @enderror

                                            </div>


                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Bangla Title
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Bangla title" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="title_bangla" placeholder="" value="{{ $errors->any() ? old('title_bangla') : (isset($designation)? $designation->title_bangla :'')}}">
                                                @error('title_bangla')<span class="text-danger f-s-12">{{$errors->first('title_bangla')}}</span> @enderror

                                            </div>

                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                   Position Number
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Position Number" data-bs-placement="right"></i>

                                                </label>
                                                <input type="text"  class="form-control" name="position_number" placeholder="" value="{{ $errors->any() ? old('position_number') : (isset($designation)? $designation->position_number :'')}}">
                                                @error('position_number')<span class="text-danger f-s-12">{{$errors->first('position_number')}}</span> @enderror

                                            </div>


                                        </div>





                                        <div class=" form-group row mt-3">


                                            <div class="col-md-4">
                                           <label for="" class="col-md-4">
                                            Status
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i>
                                            </label>
                                            <br/>
                                                <label for="" class="mt-2"> <input type="radio" name="status" value="1" @if(isset($designation)) {{$designation->status == 1 ?'checked':''}} @endif>Published</label>
                                                <label for="" class="mt-2"> <input type="radio"  name="status" value="0" @if(isset($designation)) {{$designation->status == 0 ?'checked':''}} @endif>UnPublished</label>
                                            </div>
                                        </div>

                                        <div class=" form-group row mt-3">
                                            <label for="" class="col-md-4">
                                            </label>
                                            <div class="col-md-4">
                                                <input type="submit" value="{{isset($designation)?'Update Designation':'Add Designation'}}" class="btn btn-success">
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
