@extends('backend.master')

@section('title')
{{ isset($ebookfile) ? 'Update' : 'Create' }} Ebook File
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Ebook File', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($ebookfile) ? 'Update' : 'Create' }} Ebook File</h4>
                                <a href="{{ route('library_ebook_file.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($ebookfile) ? route('library_ebook_file.update', $ebookfile->id) : route('library_ebook_file.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($ebookfile))
                                            @method('put')
                                        @endif

                                        
                                            <div class="mb-3">
                                               
                                           
                                                <label for="disabledTextInput" class="form-label">
                                                    Ebook Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Ebook Name" data-bs-placement="right"></i>
                                                </label>
                                                <br>
                                                <select name="library_ebook_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select a option</option>
                                                    @foreach($ebooks as $ebook)
                                                        <option value="{{ $ebook->id }}" {{$errors->any()&& old('library_ebook_id') == $ebook->id ? ('selected') : (isset($ebookfile) && $ebookfile->library_ebook_id == $ebook->id ? 'selected' : '')}}> {{$ebook->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('library_ebook_id')<span class="text-danger f-s-12">{{ $errors->first('library_ebook_id') }}</span> @enderror
                                            </div>
                                       
                                          
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    File Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your File Name" data-bs-placement="right"></i>
                                                </label>
                                                <br>
                                                <input type="file"  class="form-control-file" name="file_name" value="{{ $errors->any() ? old('file_name') : '' }}" placeholder=""/>
                                                @if(isset($ebookfile))
                                                    <img src="{{ asset($ebookfile->file_name) }}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                                <br> @error('file_name')<span class="text-danger f-s-12">{{ $errors->first('file_name') }}</span> @enderror
                                            </div>
                                       

                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{ isset($ebookfile) ?'Update ' : 'Add ' }}Ebookfile" class="btn btn-success">
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
