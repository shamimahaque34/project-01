@extends('backend.master')

@section('title')
    Classes
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Class</h4>
                    <a href="{{ route('classes.create') }}" class="btn btn-success float-end">
                        {{--                        <i class="mdi mdi-plus"></i>--}}
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Class Numeric</th>
                                <th>class_note</th>
                                <th>class_lavel</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as $class)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $class->class_name }}</td>
                                    <td>{{ $class->class_numeric }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($class->class_note,3,'...') !!}</td>
                                    <td>{{ $class->class_lavel }}</td>
                                    <td>{{ $class->status==0? 'Unpublished':'Publishid'}}</td>
                                    <td>
{{--                                        <a href="{{route('class.show',$class->id)}}" class="btn btn-{{$class->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$class->status==0? 'down':'up'}}"></i></a>--}}
                                        <a href="{{ route('classes.edit', $class->slug) }}" class="btn btn-primary btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                         <form action="{{ route('classes.destroy', $class->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class'); ">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm py-0 px-1">
                                                <i class="dripicons-trash"></i>
                                            </button>
                                        </form>
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

@section('style')
    <!-- Datatables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection

@section('script')
    <!-- Datatables js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#datatable-buttons').DataTable();
        });

    </script>
@endsection
