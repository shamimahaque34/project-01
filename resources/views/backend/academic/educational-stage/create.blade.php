@extends('backend.master')

@section('title')
{{ isset($educationalStage) ? 'Update' : 'Create' }} Educational Stage
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Educational Stage', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($educationalStage) ? 'Update' : 'Create' }} Educational Stage</h4>
                                <a href="{{ route('educational-stages.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($educationalStage) ? route('educational-stages.update', $educationalStage->id) : route('educational-stages.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($educationalStage))
                                            @method('put')
                                        @endif

                                        
                                            <div class="mb-3">
                                                <label  class="form-label">
                                                    Group Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Group Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="group_name" placeholder="" value="{{ $errors->any() ? old('group_name') : (isset($educationalStage) ? $educationalStage->group_name : '')}}">
                                                @error('group_name')<span class="text-danger f-s-12">{{ $errors->first('group_name') }}</span> @enderror
                                            </div>

                                            

                                            <div class="mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($educationalStage) && $educationalStage->status == 0 ? '' : 'checked')}} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                               
                                            @error('status')<span class="text-danger f-s-12" >{{$errors->first('status')}}</span> @enderror
                                           
                                        </div>
                                           </div>
                                        </div>
                                       
                                       
                                        <div class="mt-4 text-center">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($educationalStage) ? 'Update ' : 'Create ' }} Educational Stage ">
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
