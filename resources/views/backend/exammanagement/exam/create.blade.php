@extends('backend.master')

@section('title')
{{ isset($exam) ? 'Update' : 'Create' }} Exam
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($exam) ? 'Update' : 'Create' }} Exam</h4>
                                <a href="{{ route('exam.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($exam) ? route('exam.update',$exam->id) : route('exam.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($exam))
                                            @method('put')
                                        @endif

                                        <div class="row mt-4 mb-4">
                                           
                                            <div class="col-md-6">
                                                <label  class="form-label">
                                                    Exam Title
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Exam Title" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="title" placeholder="" value="{{ $errors->any() ? old('title') : (isset($exam) ? $exam->title : '') }}">
                                                @error('title')<span class="text-danger f-s-12">{{ $errors->first('title') }}</span> @enderror
                                            </div>
                                        
                                      
                                        <div class="col-md-4 mb-4">
                                            <label  class="form-label">
                                                Display Title
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Display Title" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text"  class="form-control" name="display_title" placeholder="" value="{{ $errors->any() ? old('display_title') : (isset($exam) ? $exam->display_title : '') }}">
                                            @error('display_title')<span class="text-danger f-s-12">{{ $errors->first('display_title') }}</span> @enderror
                                        </div>
                                   

                                       
                                              
                                                <div class="col-md-6 mb-4">
                                                    <label  class="form-label">
                                                        Exam Code
                                                         <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Code" data-bs-placement="right"></i>
                                                     </label>
                                                    <input type="text"  class="form-control" name="exam_code" placeholder="" value="{{ $errors->any() ? old('exam_code') : (isset($exam) ? $exam->exam_code : '')}}">
                                                    @error('exam_code')<span class="text-danger f-s-12">{{ $errors->first('exam_code') }}</span> @enderror
                                                 </div>
                                          

                                       
                                            <div class="col-md-6 mb-4" id="datepicker1">
                                                <label  class="form-label">
                                                    Date
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Date " data-bs-placement="right"></i>
                                                </label>
                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="date" placeholder="" value="{{ $errors->any() ? old('date') : (isset($exam) ? $exam->date : '') }}">
                                                @error('date')<span class="text-danger f-s-12">{{$errors->first('date')}}</span> @enderror
                                            </div>
                                           
                                       
                                            

                                        
                                            <div class="col-md-12 mb-4">
                                                <label for="" class="form-label">
                                                    Note
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Note" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="note" id="editor" cols="20" rows="5" class="form-control" value="">{!! isset($exam) ? $exam->note : '' !!}</textarea>
                                                @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($exam) && $exam->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                            </div>
                                           
                                        </div>


                                        <div class=" form-group row mt-4 float-end ">
                                            <input type="submit" value="{{ isset($exam) ? 'Update ' : 'Add ' }} Exam" class="btn btn-success">
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
