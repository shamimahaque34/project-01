@extends('backend.master')

@section('title')
{{ isset($examGrade) ? 'Update' : 'Create' }} Exam Grade
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Grade', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($examGrade) ? 'Update' : 'Create' }} Exam Grade</h4>
                                <a href="{{ route('exam_grade.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($examGrade) ? route('exam_grade.update', $examGrade->id) : route('exam_grade.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($examGrade))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                    Grade Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Grade Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="grade_name" placeholder="" value="{{ $errors->any() ? old('grade_name') : (isset($examGrade) ? $examGrade->grade_name : '') }}">
                                                @error('grade_name')<span class="text-danger f-s-12">{{ $errors->first('grade_name') }}</span> @enderror
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                    Point
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Point" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="point" placeholder="" value="{{ $errors->any() ? old('point') : (isset($examGrade) ? $examGrade->point : '') }}">
                                                @error('point')<span class="text-danger f-s-12">{{ $errors->first('point') }}</span> @enderror
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                    Mark Form
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Form" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="mark_form" placeholder="" value="{{ $errors->any() ? old('mark_form') : (isset($examGrade) ? $examGrade->mark_form : '') }}">
                                                @error('mark_form')<span class="text-danger f-s-12">{{ $errors->first('mark_form') }}</span> @enderror
                                            </div>
                                        

                                     
                                            <div class="col-md-6 mb-4">
                                                <label  class="form-label">
                                                    Mark To
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Mark To" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="mark_to" placeholder="" value="{{ $errors->any() ? old('mark_to') : (isset($examGrade) ? $examGrade->mark_to : '') }}">
                                                @error('mark_to')<span class="text-danger f-s-12">{{ $errors->first('mark_to') }}</span> @enderror
                                            </div>

                                          
                                       

                                       
                                            <div class="col-md-12 mb-4">
                                                <label for="" class="form-label">
                                                    Note
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Note" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="note" id="editor" cols="20" rows="5" class="form-control" value="">{!! isset($examGrade) ? $examGrade->note : '' !!}</textarea>
                                                @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                            <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($examGrade) && $examGrade->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                        </div>

                                        </div>

                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{ isset($examGrade) ?'Update ' : 'Add ' }} Exam Grade" class="btn btn-success">
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
