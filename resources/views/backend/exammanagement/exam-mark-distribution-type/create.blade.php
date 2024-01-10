@extends('backend.master')

@section('title')
{{ isset($ExamMarkDistribution) ? 'Update' : 'Create' }} Exam Mark Distribution Type
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Mark Distribution Type', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($ExamMarkDistribution) ? 'Update' : 'Create' }} Exam Mark Distribution Type</h4>
                                <a href="{{ route('exam_mark_distribution_type.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($ExamMarkDistribution) ? route('exam_mark_distribution_type.update', $ExamMarkDistribution->id) : route('exam_mark_distribution_type.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($ExamMarkDistribution))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                           
                                            <div class="col-md-6 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Distribution Type
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Diostribution Type" data-bs-placement="right"></i>
                                                </label>
                                                <select name="distribution_type" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select  a Distribution Type</option>
                                                    <option value="1" {{ $errors->any() ? ('selected' ) : (isset($ExamMarkDistribution) && $ExamMarkDistribution->distribution_type == 1 ? 'selected' : '') }}>ss</option>
                                                    {{--                                                    @foreach($classes as $class)--}}
                                                    {{--                                                        <option value="{{$errors->any()? old('hostel_type'): $class->id}}" {{isset($subject) && $subject->hostel_type?'selected':''}}> {{$class->hostel_type}}</option>--}}
                                                    {{--                                                    @endforeach--}}
                                                </select>
                                                @error('distribution_type')<span class="text-danger f-s-12">{{ $errors->first('distribution_type') }}</span> @enderror
                                            </div>
                                        
                                            
                                          
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                    Mark value
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Mark Value" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="mark_value" placeholder="" value="{{ $errors->any() ? old('mark_value') : (isset($ExamMarkDistribution) ? $ExamMarkDistribution->mark_value : '') }}">
                                                @error('mark_value')<span class="text-danger f-s-12">{{ $errors->first('mark_value') }}</span> @enderror
                                            </div>
                                        </div>
                                        
                                            
                                            <div class="col-md-6 mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($ExamMarkDistribution) && $ExamMarkDistribution->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                        </div>
                                        
                                        

                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{isset($ExamMarkDistribution)?'Update ':'Add '}} Exam Mark Distribution Type" class="btn btn-success">
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
