@extends('backend.master')

@section('title')
{{ isset($libraryCategory) ? 'Update' : 'Create'}} Library Category
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Library Category', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($libraryCategory) ? 'Update' : 'Create' }} Library Category</h4>
                                <a href="{{ route('library_book_category.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($libraryCategory) ? route('library_book_category.update', $libraryCategory->id) : route('library_book_category.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($libraryCategory))
                                            @method('put')
                                        @endif

                                        <div class="mb-4">
                                            
                                                <label for="disabledTextInput" class="form-label">
                                                    Category Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Category Name" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="name" placeholder="" value="{{ $errors->any() ? old('name') : (isset($libraryCategory) ? $libraryCategory->name : '') }}">
                                                @error('name')<span class="text-danger f-s-12">{{ $errors->first('name') }}</span> @enderror
                                            </div>
                                       

                                      
                                            <div class="mb-4">
                                                <div class="d-flex">
                                                <label for="" class="me-3">
                                                    Status
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                                </label>
                                              
                                                <label for=""class="mt-0"> 
                                                    <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status" {{ $errors->any() ? (old('status')) : (isset($category) && $category->status == 0 ? '' : 'checked') }} >
                                                    <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror

                                            </div>
                                        </div>
                                       

                                        <div class=" form-group row mt-4 ">
                                            <div class="col-md-4 ">
                                                <input type="submit" value="{{ isset($libraryCategory) ? 'Update Category Name' : 'Add Category Name' }}" class="btn btn-success">
                                            </div>
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
