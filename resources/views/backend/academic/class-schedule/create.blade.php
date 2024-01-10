@extends('backend.master')

@section('title')
{{ isset($classSchedule) ? 'Update' : 'Create' }} Class Schedule
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class Schedule', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($classSchedule) ? 'Update' : 'Create' }} Class Schedule</h4>
                                <a href="{{ route('class-schedules.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                               
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($classSchedule) ? route('class-schedules.update', $classSchedule->id) : route('class-schedules.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($classSchedule))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                   Starting Time
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Starting Time" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="starting_time" placeholder="" value="{{ $errors->any() ? old('starting_time') : (isset($classSchedule) ? $classSchedule->starting_time : '')}}">
                                                @error('starting_time')<span class="text-danger f-s-12">{{ $errors->first('starting_time') }}</span> @enderror
                                            </div>  

                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                   Ending Time
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Ending Time" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="ending_time" placeholder="" value="{{ $errors->any() ? old('ending_time') : (isset($classSchedule) ? $classSchedule->ending_time : '')}}">
                                                @error('ending_time')<span class="text-danger f-s-12">{{ $errors->first('ending_time') }}</span> @enderror
                                            </div>  

                                         
                                            <div class="mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($classSchedule) && $classSchedule->status == 0 ? '' : 'checked')}} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                        </div> 
                                    </div>

                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($classSchedule) ? 'Update ' : 'Create ' }} Class Schedule ">
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
