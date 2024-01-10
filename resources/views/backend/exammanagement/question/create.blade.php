@extends('backend.master')

@section('title')
{{ isset($question) ? 'Update' : 'Create' }} Question
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
                                <h4 class="float-start">{{ isset($question) ? 'Update' : 'Create' }} Question</h4>
                                <a href="{{ route('question.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($question) ? route('question.update', $question->id) : route('question.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($question))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                   Academic Class
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Class" data-bs-placement="right"></i>
                                                </label>
                                                <select name="academic_class_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select a Academic Class</option>
                                                    @foreach($academicClasses as $academicClass)
                                                        <option value="{{ $academicClass->id }}" {{ $errors->any() && old('academic_class_id') ? ('selected') : (isset($question) && $question->academic_class_id == $academicClass->id ? 'selected' : '')}}> {{ $academicClass->class_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Subject
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Subject name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="subject_id" class="select1 form-control" data-toggle="select" data-placeholder="Choose ...">
                                                    <option value="">Select A Subject</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{ $subject->id }}" {{$errors->any()&& old('subject_id') ? ('selected') : (isset($question) && $question->subject_id == $subject->id ? 'selected' : '') }}> {{ $subject->Subject_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subject_id ')<span class="text-danger f-s-12">{{ $errors->first('subject_id ') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Question Difficulty
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Question Difficulty" data-bs-placement="right"></i>
                                                </label>
                                                <select name="question_difficulty_level_id" class="select1 form-control" data-toggle="select1" data-placeholder="Choose ...">
                                                    <option value=""> Select a Question Difficulty Level</option>
                                                    @foreach($difficultys as $difficulty)
                                                        <option value="{{ $difficulty->id }}" {{ $errors->any() && old('question_difficulty_level_id') == $difficulty->id ? ('selected') : (isset($question) && $question->question_difficulty_level_id == $difficulty->id ? 'selected' : '')}}> {{ $difficulty->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('question_difficulty_level_id')<span class="text-danger f-s-12">{{ $errors->first('question_difficulty_level_id') }}</span> @enderror
                                            </div>


                                      
                                        
                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Question
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Question" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="question" placeholder="" value="{{ $errors->any() ? old('question') : (isset($question) ? $question->question : '') }}">
                                                @error('question')<span class="text-danger f-s-12">{{ $errors->first('question') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Mark
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Mark" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="mark" placeholder="" value="{{ $errors->any() ? old('mark') : (isset($question) ? $question->mark : '') }}">
                                                @error('mark')<span class="text-danger f-s-12">{{ $errors->first('mark') }}</span> @enderror
                                            </div>


                                          

                                            <div class="col-md-4 mb-4">
                                                <label class="form-label">
                                                    Question Image
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Question Image" data-bs-placement="right"></i>
                                                </label>
                                                <br>
                                                <input type="file"  class="form-control-file" name="question_img" placeholder=""/>
                                                @if(isset($question))
                                                    <img src="{{ asset($question->question_img) }}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                                @error('question_img')<span class="text-danger f-s-12">{{ $errors->first('question_img') }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="" class="form-label">
                                                    Explanation
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Explanation" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="explanation" id="editor" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('explanation ')) : (isset($question) ? $question->explanation : '')!!}</textarea>
                                                @error('explanation ')<span class="text-danger f-s-12">{{ $errors->first('explanation ') }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="" class="form-label">
                                                    Hints
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Hints" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="hints" id="editor1" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('hints')) : (isset($question) ? $question->hints : '')!!}</textarea>
                                                @error('hints ')<span class="text-danger f-s-12">{{ $errors->first('hints') }}</span> @enderror
                                            </div>
                                            
                                            {{-- <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Question Answer type
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Question Answer type" data-bs-placement="right"></i>
                                                </label>
                                                <select name="question_answer_type" class="select1 form-control" data-toggle="select1" onchange="questionAnswerTypes();" id="questionAnswerType" data-placeholder="Choose ...">
                                                        <option value="1" {{ $errors->any() && old('question_answer_type') ? ('selected') : (isset($question) && $question->question_answer_type == 1 ? 'selected' : '') }}>MCQ</option>
                                                        <option value="2" {{ $errors->any() && old('question_answer_type') ? ('selected') : (isset($question) && $question->question_answer_type == 2 ? 'selected' : '')}}>Fill In The Blanks</option>
                                                        <option value="3" selected {{ $errors->any() && old('question_answer_type') ? ('selected') : (isset($question) && $question->question_answer_type == 3 ? 'selected' : '')}}>Brod Ques Ans</option>
                                                </select>
                                                @error('question_answer_type')<span class="text-danger f-s-12">{{ $errors->first('question_answer_type') }}</span> @enderror
                                            </div> --}}

                                        
                                            {{-- <div class="col-md-4 mb-4"  id="totalOption">
                                                <label  class="form-label">
                                                    Total Option
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Total Option" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control " id="inputTotalOption" name="total_options" placeholder="" value="{{ $errors->any() ? old('total_options') : (isset($question) ? $question->total_options : '') }}">
                                                @error('total_options')<span class="text-danger f-s-12">{{ $errors->first('total_options') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4"  id="">
                                                <label  class="form-label">
                                                    Option Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Option Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control " id="inputTotalOption" name="option_name[]" placeholder="" value="{{ $errors->any() ? old('option_name') : (isset($questionBankAnswerOption) ? $questionBankAnswerOption->option_name : '') }}">
                                                @error('option_name')<span class="text-danger f-s-12">{{ $errors->first('option_name') }}</span> @enderror
                                            </div>


                                            <div class="mb-4">
                                                <label for="" class="form-label">
                                                    Full Ans
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Full Ans" data-bs-placement="right"></i>
                                                </label>
                                                <textarea name="full_ans" id="editor2" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('full_ans')) : (isset($question) ? $question->full_ans : '')!!}</textarea>
                                                @error('full_ans')<span class="text-danger f-s-12">{{ $errors->first('full_ans') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label class="form-label">
                                                    Option Image
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Option Image" data-bs-placement="right"></i>
                                                </label>
                                                <br>
                                                <input type="file"  class="form-control-file" name="option_img[]" placeholder=""/>
                                                @if(isset($questionBankAnswerOption))
                                                    <img src="{{ asset($questionBankAnswerOption->option_img) }}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                                @error('option_img')<span class="text-danger f-s-12">{{ $errors->first('option_img') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Is Correct
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Is Correct" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="is_correct[]" {{ $errors->any() ? (old('is_correct')) : (isset($questionBankAnswerOption) && $questionBankAnswerOption->is_correct == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('is_correct')<span class="text-danger f-s-12" >{{ $errors->first('is_correct') }}</span> @enderror
                                            </div> --}}

                                            <div class="col-md-6 mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($question) && $question->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                            
                                            </div>

                                        </div>
                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{ isset($question) ? 'Update' : 'Add' }} question" class="btn btn-success">
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
