@extends('backend.master')

@section('title')
{{isset($feeType) ?'Update':'Create'}} Fee Type
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Fee Type', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($feeType) ?'Update':'Create'}} Fee Type</h4>
                    <a href="{{ route('fee_types.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($feeType) ? route('fee_types.update', $feeType->id) : route('fee_types.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($feeType))
                                @method('put')
                            @endif

                            <div class="row mt-2">
                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Fee Type
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Fee Type" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="fee_type" placeholder="" value="{{ $errors->any() ? old('fee_type') : (isset($feeType)? $feeType->fee_type :'')}}">
                                    @error('fee_type')<span class="text-danger f-s-12">{{$errors->first('fee_type')}}</span> @enderror
                                </div>
                              

                                <div class="col-md-12 mb-4">
                                    <label for="" class="form-label">
                                        Note
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Note" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="note" id="editor" cols="20" rows="5" class="form-control" >{!!isset($feeType)? $feeType->note:''!!}</textarea>
                                    @error('note')<span class="text-danger f-s-12">{{$errors->first('note')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label for="" class="">
                                     Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Your Fee Type Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch2" name="status" {{ isset($feeType) && $feeType->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                </div>

                            </div>

                            <div class=" form-group row mt-3 row">
                                <input type="submit" value="{{isset($feeType)?'Update ':'Add '}} Fee Type" class="btn btn-success col-md-4 mx-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
