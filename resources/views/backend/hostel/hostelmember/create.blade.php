@extends('backend.master')

@section('title')
{{ isset($hostelmember) ? 'Update' : 'Create'}} Hostel Member
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Hostel Member', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{ isset($hostelmember) ? 'Update' : 'Create' }} Hostel Member</h4>
                                <a href="{{ route('hostel_member.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($hostelmember) ? route('hostel_member.update', $hostelmember->id) : route('hostel_member.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($hostelmember))
                                            @method('put')
                                        @endif

                                        <div class=" row mt-2">
                                            <div class="col-md-6 mb-3">
                                                <label for="disabledTextInput" class="form-label">
                                                    User Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your User Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="user_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">select a option</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}" {{ $errors->any() && old('user_id') == $user->id ? ('selected') : (isset($hostelmember) && $hostelmember->user_id == $user->id ? 'selected' : '') }}> {{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')<span class="text-danger f-s-12">{{ $errors->first('user_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="disabledTextInput" class="form-label">
                                                    Student Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Student Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="student_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">select a option</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}" {{ $errors->any() && old('user_id') == $user->id ? ('selected') : (isset($hostelmember) && $hostelmember->student_id == $user->id ? 'selected' : '') }}> {{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('student_id')<span class="text-danger f-s-12">{{ $errors->first('student_id') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="disabledTextInput" class="form-label">
                                                    Teacher Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Teacher Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="teacher_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                                    <option value="">select a option</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}" {{ $errors->any() && old('user_id') == $user->id ? ('selected') : (isset($hostelmember) && $hostelmember->teacher_id == $user->id ? 'selected' : '') }}> {{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('teacher_id')<span class="text-danger f-s-12">{{ $errors->first('teacher_id') }}</span> @enderror
                                            </div>

                                       

                                        
                                            <div class="col-md-6 mb-3">
                                                <label for="disabledTextInput" class="form-label">
                                                    Hostel Name
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Hostel Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="hostel_id" class="select1 form-control" data-toggle="select1" data-placeholder="Choose ...">
                                                    <option value="">select a option</option>
                                                    @foreach($hostels as $hostel)
                                                        <option value="{{ $hostel->id }}" {{ $errors->any() && old('hostel_id') == $hostel->id ? ('selected') : (isset($hostelmember) && $hostelmember->hostel_id == $hostel->id ? 'selected' : '') }}> {{ $hostel->hostel_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('hostel_id')<span class="text-danger f-s-12">{{ $errors->first('hostel_id') }}</span> @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">
                                                    Hostel Balance
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Hostel Balance" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="bostel_balance" placeholder="" value="{{ $errors->any() ? old('bostel_balance') : (isset($hostelmember) ? $hostelmember->bostel_balance : '')}}">
                                                @error('bostel_balance')<span class="text-danger f-s-12">{{ $errors->first('bostel_balance') }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-3" id="datepicker1">
                                                <label  class="form-label">
                                                    <span class="text-danger">* </span>
                                                    Joining Date
                                                    <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert teacher's Joining Date" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text" class="form-control" name="jod" placeholder="" data-provide="datepicker" data-date-container="#datepicker1"  value="{{ $errors->any() ? old('jod') : (isset($hostelmember) ? \Illuminate\Support\Carbon::parse($hostelmember->jod)->format('m/d/Y') : '') }}">
                                                @error('jod')<span class="text-danger f-s-12">{{ $errors->first('jod') }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class=" form-group row mt-3 float-end ">
                                            <input type="submit" value="{{ isset($hostelmember) ? 'Update ' :  'Add '}} Hostel Member" class="btn btn-success">
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
