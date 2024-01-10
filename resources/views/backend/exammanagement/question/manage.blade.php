@extends('backend.master')

@section('title')
    Question
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Question', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Question</h4>
                    <a href="{{ route('question.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Accademic Class</th>
                                <th>Subject Name</th>
                                <th>Question Difficulty Level</th>
                                <th>Question</th>
                                <th>Explanation</th>
                                <th>Question Image</th>
                                <th>Mark</th>
                                <th>Hints</th>
                                <th>Question Answer Type</th>
                                <th>total Options</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $question->academicClass->class_name }}</td>
                                    <td>{{ $question->subject->Subject_name }}</td>
                                    <td>{{ $question->questionDifficultyLevel->title }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{!! $question->explanation !!}</td>
                                    <td>
                                        <a class="image-popup" href="{{asset($question->question_img)}}">
                                        <img src=" {{ asset($question->question_img) }}" alt="" height="80px" width="80px">
                                        </a>

                                    </td>
                                    <td>{{ $question->mark }}</td>
                                    <td>{!! $question->hints !!}</td>
                                    <td>{{ $question->question_answer_type }}</td>
                                    <td>{{ $question->total_options }}</td>
                                    <td>{{ $question->status==0? 'Unpublished':'Publishied'}}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{ route('question.edit', $question->slug) }}" class="btn btn-success btn-sm"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('question.destroy', $question->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Question');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm mx-2">
                                                <i class="dripicons-trash"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalButton{{$question->id}}"><i class="dripicons-document"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalButton{{$question->id}}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Fill Up The Form</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ isset($questionBankAnswerOption) ? route('question_bank_answer_options.update', $questionBankAnswerOption->id) : route('question_bank_answer_options.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @if(isset($questionBankAnswerOption))
                                                        @method('put')
                                                    @endif
                                                        <input type="hidden"  class="form-control" name="question_id" placeholder="" value="{{ $question->id }}">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <label  class="form-label">
                                                                    Question
                                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Question" data-bs-placement="right"></i>
                                                                </label>
                                                                <input type="text" readonly class="form-control" name="question" placeholder="" value=" {{$question->question}}">
                                                            </div>
                
                                                            <div class="col-md-6 mb-4">
                                                                <label for="disabledTextInput" class="form-label">
                                                                    Question Answer type
                                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Question Answer type" data-bs-placement="right"></i>
                                                                </label>
                                                                <select name="question_answer_type" class="select2 form-control" data-toggle="select2" id="questionAnswerType" data-placeholder="Choose ...">
                                                                        <option value="1">MCQ</option>
                                                                        <option value="2">Fill In The Blanks</option>
                                                                        <option value="3">Brod Ques Ans</option>
                                                                </select>
                                                            </div>

                                                            
                
                                                        
                                                            <div class="col-md-6 mb-4 totalOption"id="">
                                                                <label  class="form-label">
                                                                    Total Option
                                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Total Option" data-bs-placement="right"></i>
                                                                </label>
                                                                <input type="text"  class="form-control inputTotalOption" id="" name="total_options" placeholder="" value="{{ $errors->any() ? old('total_options') : (isset($question) ? $question->total_options : '') }}">
                                                                @error('total_options')<span class="text-danger f-s-12">{{ $errors->first('total_options') }}</span> @enderror
                                                            </div>
                
                                                           
                                                            
                
                                                            <div class="col-md-6 mb-4 fullAnswer" id="" style="display:none">
                                                                <label for="" class="form-label">
                                                                    Full Ans
                                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Full Ans" data-bs-placement="right"></i>
                                                                </label>
                                                                <textarea name="full_ans" id="editor3" cols="20" rows="5" class="form-control" value="">{!! $errors->any() ? (old('full_ans')) : (isset($questionBankAnswerOption) ? $questionBankAnswerOption->full_ans : '')!!}</textarea>
                                                                @error('full_ans')<span class="text-danger f-s-12">{{ $errors->first('full_ans') }}</span> @enderror
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        <div class="card card-body mb-0 cardBody">
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-4"  id="">
                                                                            <label  class="form-label">
                                                                                Option Name
                                                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Option Name" data-bs-placement="right"></i>
                                                                            </label>
                                                                            <input type="text"  class="form-control " id="inputTotalOption" name="option_name[]" placeholder="" value="">
                                                                            
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">
                                                                                        Option Image
                                                                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Option Image" data-bs-placement="right"></i>
                                                                                    </label>
                                                                                    <input type="file"  class="form-control fileInput" name="option_img[]" placeholder="" id="">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <img src="{{ asset('/') }}backend/admin/img/download.png" alt="Image Placeholder" id="" class="rounded-2 image" style="width: 100%; height: 160px; object-fit: cover;">
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="d-flex">
                                                                                <label for="" class="me-3">
                                                                                    Is Correct
                                                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Is Correct" data-bs-placement="right"></i><br>
                                                                                </label>
                                                                            
                                                                                <label for=""class="mt-0"> 
                                                                                    <input type="checkbox" class="me-1 " id="switch1" data-switch="bool"  name="is_correct[]" >
                                                                                    <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                                                                @error('is_correct')<span class="text-danger f-s-12" >{{ $errors->first('is_correct') }}</span> @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="mb-2">
                                                                        <button type="button" class="btn btn-primary buttonPlus"><i class="dripicons-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="text-center pb-2">
                                                            <button type="submit" class="btn btn-success">Add Answer</button>
                                                        </div>
                                                   
                                                    </form>
                                                </div>      
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
//         // Image Preview Starts Here
//             // Get the file input element
// var fileInput = document.getElementsByClassName('fileInput');

// // Listen for change events on the file input element
// fileInput.addEventListener('change', function () {
//     // Get the selected file
//     var file = this.files[0];

//     // Create a new FileReader object
//     var reader = new FileReader();

//     // Listen for the load event on the FileReader
//     reader.addEventListener('load', function () {
//         // Get the image element
//         var imageElement = document.getElementsByClassName('image');

//         // Set the src attribute of the image to the data URL of the image
//         imageElement.src = this.result;
//     });

//     // Read the file as a data URL
//     reader.readAsDataURL(file);
// });
        // Image Preview Ends Here

    $(document).on('change', '#questionAnswerType', function () {
        var questionAnswerType = $(this).val();
        var totalOption = $('.totalOption');
    var fullAns = $('.fullAnswer');
    var card =$('.cardBody');
    var inputTotalOption = $('.inputTotalOption').val();
     console.log(inputTotalOption);

    if(questionAnswerType == 3){
           totalOption.hide();
           fullAns.show();
           card.hide()

    }

    else{
        totalOption.show();
        fullAns.hide();
        card.show()

        
    }
    });
    function questionAnswerTypes() {
        
    var questionAnswerType = $('#questionAnswerType').val();
    alert(questionAnswerType);
    var totalOption = $('.totalOption');
    var fullAns = $('.fullAnswer');
    var card =$('.cardBody');
    var inputTotalOption = $('.inputTotalOption').val();
     console.log(inputTotalOption);

    if(questionAnswerType == 1){
           totalOption.hide();
           fullAns.show();
           card.hide()

    }

    else{
        totalOption.show();
        fullAns.hide();
        card.show()

        
    }
}


$(document).on('click', '.buttonPlus', function() {  
    
        var div1 = 1;
        var div= '<div class="row" id="cardAppendses"><div class="col-md-11"><div class="row"><div class="col-md-12 mb-4" id=""><label class="form-label">Option Name<i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Option Name" data-bs-placement="right"></i></label><input type="text" class="form-control" id="inputTotalOption" name="option_name[]" placeholder="" value=""></div><div class="col-md-8"><div class="row"><div class="col-md-6"><label class="form-label">Option Image<i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Option Image" data-bs-placement="right"></i></label><input type="file" class="form-control" name="option_img[]" placeholder="" id="fileInput"></div><div class="col-md-6"><img src="{{ asset('') }}/backend/admin/img/download.png" alt="Image Placeholder" id="image" class="rounded-2" style="width:100%;height:160px;object-fit:cover"></div></div></div><div class="col-md-4"><div class="d-flex"><label for="" class="me-3">Is Correct<i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Is Correct" data-bs-placement="right"></i><br></label><label for="" class="mt-0"><input type="checkbox" class="me-1" id="switch'+(++div1)+'" data-switch="bool" name="is_correct[]"><label for="switch'+(div1)+'" data-on-label="On" data-off-label="Off"></label></div></div></div></div><div class="col-md-1"><div class="mb-2"><button type="button" class="btn btn-primary buttonPlus"><i class="dripicons-plus"></i></button></div><div><button type="button" class="btn btn-danger buttonMinus"><i class="dripicons-minus"></i></button></div></div></div>';

        $('.cardBody').append(div);
        
    });


    $(document).on('click', '.buttonMinus', function () {
        $(this).closest('div').parent().parent().remove();
    });

    
    </script>
    @endsection
@endsection

