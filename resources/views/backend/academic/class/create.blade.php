@extends('backend.master')

@section('title')
{{isset($class) ?'Update':'Create'}} Class
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($class) ?'Update':'Create'}}  Class</h4>
                                <a href="{{ route('classes.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($class) ? route('classes.update', $class->id) : route('classes.store') }}" method="POST">
                                        @csrf
                                        @if(isset($class))
                                            @method('put')
                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label">Class Name </label>
                                            <input type="text" class="form-control" name="class_name" value="{{ isset($class) ? $class->class_name : '' }}" data-provide="typeahead" id="the-basics" placeholder="Role Title">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Class Numeric </label>
                                            <input type="text" class="form-control" name="class_numeric" value="{{ isset($class) ? $class->class_numeric : '' }}" data-provide="typeahead" id="the-basics" placeholder="Role Title">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Note </label><br>
                                            <textarea name="class_note" id="editor1" cols="50" rows="5"> {!! isset($class) ? $class->class_note : '' !!}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Label</label>
                                            <select name="class_lavel" class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                <option value="primary" {{isset($class) && $class->class_label=='primary'? 'selected':''}}>Primary</option>
                                                <option value="school" {{isset($class) && $class->class_label=='school'? 'selected':''}}>School</option>
                                                <option value="college" {{isset($class) && $class->class_label=='college'? 'selected':''}}>College</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Status</label>
                                            <div class="col-md-9">
                                                <label class="sm-2" for=""><input type="radio" name="status" {{isset($class) && $class->status == 1? 'checked':''}} value="1"> Published</label>
                                                <label for=""><input type="radio" name="status" {{isset($class) && $class->status == 0? 'checked':''}} value="0"> Unpublished</label>
                                            </div>
                                        </div>
                                        <div class="mb-3 float-end">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($class) ? 'Update' : 'Create' }} Class">
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
