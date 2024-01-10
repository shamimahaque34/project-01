@extends('backend.master')

@section('title')
{{ isset($studentGroup) ? 'Update' : 'Create'}} Student Group
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>' Student Group', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($studentGroup) ? 'Update' : 'Create'}} Student Group</h4>
                                <a href="{{ route('student-groups.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($studentGroup) ? route('student-groups.update', $studentGroup->id) : route('student-groups.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($studentGroup))
                                            @method('put')
                                        @endif

                                       
                                            
                                            <div class=" mb-3">
                                                <label  class="form-label">
                                                    Group Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Group Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="group_name" placeholder="" value="{{ $errors->any() ? old('group_name') : (isset($studentGroup) ? $studentGroup->group_name : '')}}">
                                                @error('group_name')<span class="text-danger f-s-12">{{ $errors->first('group_name') }}</span> @enderror
                                            </div>


                                            <div class=" mb-4">
                                                <label for="" class="form-label">
                                                    Note
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Note" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="note" id="editor" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('note')) : (isset($studentGroup) ? $studentGroup->note : '') !!}</textarea>
                                                @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span> @enderror
                                            </div>

                                           
                                           
                                            <div class="mb-4">
                                                <div class="d-flex">
                                                    <label for="" class="me-3">
                                                        Status
                                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                    </label>
                                                    <label for=""class="mt-0"> 
                                                        <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($studentGroup) && $studentGroup->status == 0 ? '' : 'checked') }} >
                                                        <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                    @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                                </div>
                                                                                                                                         
                                    </div>
                                </div>
                                       
                                       
                                        <div class="mt-5 float-end">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($studentGroup) ? 'Update ' : 'Create ' }} Student Group ">
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
