@extends('backend.master')

@section('title')
{{ isset($questionDificulty) ? 'Update' : 'Create' }} Question Difficulty level
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Question Difficulty level', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($questionDificulty) ? 'Update' : 'Create' }} Question Difficulty level</h4>
                                <a href="{{ route('question_difficulty_level.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($questionDificulty) ? route('question_difficulty_level.update', $questionDificulty->id) : route('question_difficulty_level.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($questionDificulty))
                                            @method('put')
                                        @endif
                                        <div class="row mt-2">
                                            
                                            <div class=" mb-4">
                                                <label  class="form-label">
                                                    Title
                                                     <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Title" data-bs-placement="right"></i>
                                                 </label>
                                                <input type="text"  class="form-control" name="title" placeholder="" value="{{ $errors->any() ? old('title') : (isset($questionDificulty) ? $questionDificulty->title : '') }}">
                                                @error('title')<span class="text-danger f-s-12">{{ $errors->first('title') }}</span> @enderror
                                            </div>
                                       
                                       
                                       
                                        
                                            <div class="mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($questionDificulty) && $questionDificulty->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                            </div>

                                        </div>
                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{ isset($questionDificulty) ? 'Update' : 'Add'}} Question Difficulty Level" class="btn btn-success">
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
