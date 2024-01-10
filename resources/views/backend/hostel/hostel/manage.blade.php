@extends('backend.master')

@section('title')
    Hostel
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Hostel', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Hostel</h4>
                    <a href="{{ route('hostel.create') }}" class="btn btn-success float-end">
                        {{--                        <i class="mdi mdi-plus"></i>--}}
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Hostel Name</th>
                                <th>Hostel Type</th>
                                <th>Address</th>
                                <th>Fee</th>
                                <th>class Type</th>
                                <th>Total Floor</th>
                                <th>Total Rooms</th>
                                <th>Seat Per Room</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hostels as $hostel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hostel->hostel_name }}</td>
                                    <td>{{ $hostel->hostel_type }}</td>
                                    <td>{!! $hostel->address !!}</td>
                                    <td>{{ $hostel->fee }}</td>
                                    <td>{{ $hostel->class_type }}</td>
                                    <td>{{ $hostel->total_floor }}</td>
                                    <td>{{ $hostel->total_rooms }}</td>
                                    <td>{{ $hostel->seat_per_room }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($hostel->note,4,'....') !!} </td>
                                    <td>{{ $hostel->status == 0 ? 'Unpublished' : 'Publishid' }}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$hostel->id)}}" class="btn btn-{{$hostel->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$hostel->status==0? 'down':'up'}}"></i></a>--}}
                                        <div class="d-flex">
                                        <a href="{{ route('hostel.edit', $hostel->id) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('hostel.destroy', $hostel->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Hostel'); ">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm py-0 px-1">
                                                <i class="dripicons-trash"></i>
                                            </button>
                                        </form>
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
@endsection

