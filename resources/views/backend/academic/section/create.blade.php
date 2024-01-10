@extends('backend.master')

@section('title')
{{ isset($section) ? 'Update' : 'Create'}} Section
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>' Section', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($section) ? 'Update' : 'Create' }} Section</h4>
                                <a href="{{ route('sections.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($section) ? route('sections.update', $section->id) : route('sections.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($section))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                    section Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set section Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="section_name" placeholder="" value="{{ $errors->any() ? old('section_name') : (isset($section) ? $section->section_name : '')}}">
                                                @error('section_name')<span class="text-danger f-s-12">{{ $errors->first('section_name') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                    Section capacity
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set section capacity" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="section_capacity" placeholder="" value="{{ $errors->any() ? old('section_capacity') : (isset($section) ? $section->section_capacity : '')}}">
                                                @error('section_capacity')<span class="text-danger f-s-12">{{ $errors->first('section_capacity') }}</span> @enderror
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <label for="" class="form-label">
                                                   Section Note
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Section Note" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="section_note" id="editor" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('section_note')) : (isset($section) ? $section->note : '') !!}</textarea>
                                                @error('section_note')<span class="text-danger f-s-12">{{ $errors->first('section_note') }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($section) && $section->status == 0 ? '' : 'checked')}} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                                </div>
                                            </div>   
                                        </div>   
                                            
                                            <div class="col-md-2">
                                                <input type="submit" class="mt-3 btn btn-success" data-provide="typeahead" id="" value="{{ isset($section) ? 'Update ' : 'Create ' }} Section ">
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
