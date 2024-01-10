@extends('backend.master')

@section('title')
{{ isset($libraryBook) ? 'Update' : 'Create' }} Library Book
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Library Book', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($libraryBook) ? 'Update' : 'Create'}} Library Book</h4>
                                <a href="{{ route('library_book.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($libraryBook) ? route('library_book.update', $libraryBook->id) : route('library_book.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($libraryBook))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">
                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Category Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Category Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="library_book_category_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">select a category</option>
                                                    @foreach($librarybookcategorys as $book)
                                                        <option value="{{ $book->id }}" {{ $errors->any()&& old('library_book_category_id') == $book->id ? 'selected': (isset($libraryBook) && $libraryBook->library_book_category_id == $book->id? 'selected' : '') }}> {{$book->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('library_book_category_id')<span class="text-danger f-s-12">{{ $errors->first('library_book_category_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Book Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Book Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="name" placeholder="" value="{{ $errors->any() ? old('name') : (isset($libraryBook) ? $libraryBook->name : '') }}">
                                                @error('name')<span class="text-danger f-s-12">{{ $errors->first('name') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label for="" class="form-label">
                                                    Author Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Author Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="author_name" placeholder="" value="{{ $errors->any() ? old('author_name') : (isset($libraryBook) ? $libraryBook->author_name : '')}}">
                                                @error('author_name')<span class="text-danger f-s-12">{{ $errors->first('author_name') }}</span> @enderror
                                            </div>
                                        


                                        
                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                   Publisher Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Publisher Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="publisher_name" placeholder="" value="{{ $errors->any() ? old('publisher_name') : (isset($libraryBook) ? $libraryBook->publisher_name : '')}}">
                                                @error('publisher_name')<span class="text-danger f-s-12">{{ $errors->first('publisher_name') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Book Code
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Book Code" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="book_code" placeholder="" value="{{ $errors->any() ? old('book_code') : (isset($libraryBook) ? $libraryBook->book_code : '')}}">
                                                @error('book_code')<span class="text-danger f-s-12">{{ $errors->first('book_code') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Price
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Price" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="price" placeholder="" value="{{ $errors->any() ? old('price') : (isset($libraryBook) ? $libraryBook->price : '')}}">
                                                @error('price')<span class="text-danger f-s-12">{{ $errors->first('price') }}</span> @enderror
                                            </div>
                                       

                                    
                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Quantity
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Quantity" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="quantity" placeholder="" value="{{ $errors->any() ? old('quantity') : (isset($libraryBook) ? $libraryBook->quantity : '')}}">
                                                @error('quantity')<span class="text-danger f-s-12">{{ $errors->first('quantity') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Due Quantity
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Due Quantity" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="due_quantity" placeholder="" value="{{ $errors->any() ? old('due_quantity') : (isset($libraryBook) ? $libraryBook->due_quantity : '')}}">
                                                @error('due_quantity')<span class="text-danger f-s-12">{{ $errors->first('due_quantity') }}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <label class="form-label">
                                                    Cover Image
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Cover Image" data-bs-placement="right"></i>
                                                </label>
                                                <br>
                                                <input type="file"  class="form-control-file" name="cover_image" placeholder=""/>
                                                @if(isset($libraryBook))
                                                    <img src="{{ asset($libraryBook->cover_image) }}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                                <br>@error('cover_image')<span class="text-danger f-s-12">{{ $errors->first('cover_image') }}</span> @enderror
                                            </div>
                                        

                                        
                                            <div class="col-md-4 mb-4">
                                                <label  class="form-label">
                                                    Self Number
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Self Number" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="self_no" placeholder="" value="{{ $errors->any() ? old('self_no') : (isset($libraryBook) ? $libraryBook->self_no : '')}}">
                                                @error('self_no')<span class="text-danger f-s-12">{{ $errors->first('self_no') }}</span> @enderror
                                            </div>

                                            <div class=" col-md-4 mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($book) && $book->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                        <div class=" form-group row mt-3 float-end ">
                                                <input type="submit" value="{{isset($libraryBook)?'Update Library Book':'Add Library Book'}}" class="btn btn-success">
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
