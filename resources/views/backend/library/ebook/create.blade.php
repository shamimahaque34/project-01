@extends('backend.master')

@section('title')
{{ isset($ebook) ? 'Update' : 'Create' }} Ebook
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Ebook', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($ebook) ? 'Update' : 'Create'}} Ebook</h4>
                                <a href="{{ route('library_ebook.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($ebook) ? route('library_ebook.update', $ebook->id) : route('library_ebook.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($ebook))
                                            @method('put')
                                        @endif

                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Book Category
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Book Category" data-bs-placement="right"></i>
                                                </label>
                                                <select name="library_book_category_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select A Library Category</option>
                                                    @foreach($librarycategoryes as $category)
                                                        <option value="{{ $category->id }}" {{ $errors->any()&& old('library_book_category_id') == $category->id ? ('selected') : (isset($ebook) && $ebook->library_book_category_id==$category->id ? 'selected' : '')}}> {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('library_book_category_id')<span class="text-danger f-s-12">{{ $errors->first('library_book_category_id') }}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Academic Class Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Class Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="academic_class_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">Select A Academic Class</option>
                                                    @foreach($academicClasses as $academicClass)
                                                    <option value="{{ $errors->any() ? old('academic_class_id') : $academicClass->id }}" {{ isset($ebook) && $ebook->academic_class_id == $academicClass->id ? 'selected' : '' }}> {{ $academicClass->class_name }}</option>
                                                    @endforeach
                                                </select>
                                               @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Book Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Book Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="name" placeholder="" value="{{ $errors->any() ? old('name') : (isset($ebook) ? $ebook->name : '')}}">
                                                @error('name')<span class="text-danger f-s-12">{{ $errors->first('name') }}</span> @enderror
                                            </div>


                                        </div>


                                        <div class="form-group row mt-2">

                                            <div class="col-md-4">
                                                <label for="" class="form-label">
                                                    Author Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Author Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="author_name" placeholder="" value="{{ $errors->any() ? old('author_name') : (isset($ebook) ? $ebook->author_name : '')}}">
                                                @error('author_name')<span class="text-danger f-s-12">{{ $errors->first('author_name') }}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Book Code
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Book Code" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="book_code" placeholder="" value="{{ $errors->any() ? old('book_code') : (isset($ebook) ? $ebook->book_code : '')}}">
                                                @error('book_code')<span class="text-danger f-s-12">{{ $errors->first('book_code') }}</span> @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label  class="form-label">
                                                    Price
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Price" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="price" placeholder="" value="{{ $errors->any() ? old('price') : (isset($ebook) ? $ebook->price : '')}}">
                                                @error('price')<span class="text-danger f-s-12">{{ $errors->first('price') }}</span> @enderror
                                            </div>

                                        </div>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-4">
                                                <label class="form-label">
                                                    Cover Image
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Cover Image" data-bs-placement="right"></i>
                                                </label>
                                                <br>
                                                <input type="file"  class="form-control-file" name="cover_image" placeholder=""/>
                                                @if(isset($ebook))
                                                    <img src="{{ asset($ebook->cover_image) }}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                                <br> @error('cover_image')<span class="text-danger f-s-12">{{ $errors->first('cover_image') }}</span> @enderror
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($ebook) && $ebook->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{isset($ebook)?'Update ':'Add '}} Ebook" class="btn btn-success">
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
