@extends('backend.master')

@section('title')
{{ isset($associateExamQuestion) ? 'Update' : 'Create' }} Associate Exam Question
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Queston', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($associateExamQuestion) ? 'Update' : 'Create' }} Associate Exam Question</h4>
                                <a href="{{ route('associate_exam_questions.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($associateExamQuestion) ? route('associate_exam_questions.update', $associateExamQuestion->id) : route('associate_exam_questions.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($associateExamQuestion))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                  Exam Question
                                                    <i class="dripicons-associateExamQuestion" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Question" data-bs-placement="right"></i>
                                                </label>
                                                <select name="exam_question_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select a Exam Question</option>
                                                    @foreach($examQuestions as $examQuestion)
                                                        <option value="{{ $examQuestion->id }}" {{ $errors->any() && old('exam_question_id') ? ('selected') : (isset($associateExamQuestion) && $associateExamQuestion->exam_question_id == $examQuestion->id? 'selected' : '')}}> {{ $examQuestion->id }}</option>
                                                    @endforeach
                                                </select>
                                                @error('exam_question_id')<span class="text-danger f-s-12">{{ $errors->first('exam_question_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                  Question
                                                    <i class="dripicons-associateExamQuestion" data-bs-toggle="tooltip" data-bs-title="Set Your Question" data-bs-placement="right"></i>
                                                </label>
                                                <select name="question_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select a Question </option>
                                                    @foreach($questions as $question)
                                                        <option value="{{ $question->id }}" {{ $errors->any() && old('question_id') ? ('selected') : (isset($associateExamQuestion) && $associateExamQuestion->question_id == $question->id ? 'selected' : '')}}> {{ $question->id }}</option>
                                                    @endforeach
                                                </select>
                                                @error('question_id')<span class="text-danger f-s-12">{{ $errors->first('question_id') }}</span> @enderror
                                            </div>

                                           

                                            

                                       
                                        

                                          

                                           

                                        </div>
                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{ isset($associateExamQuestion) ? 'Update' : 'Add' }} Associate Exam Question" class="btn btn-success">
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
