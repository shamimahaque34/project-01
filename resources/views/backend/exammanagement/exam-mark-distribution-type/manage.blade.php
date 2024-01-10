@extends('backend.master')

@section('title')
    Exam mark Distribution Type
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Mark distribution type', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam Mark distribution</h4>
                    <a href="{{ route('exam_mark_distribution_type.create') }}" class="btn btn-success float-end">
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
                                <th>Distribution Type</th>
                                <th>Mark Value</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exam_dist_type as $examdist)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $examdist->distribution_type }}</td>
                                    <td>{{ $examdist->mark_value }}</td>
                                     <td>{{ $examdist->status==0? 'Unpublished':'Published'}}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$examdist->id)}}" class="btn btn-{{$examdist->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$examdist->status==0? 'down':'up'}}"></i></a>--}}
                                        <a href="{{ route('exam_mark_distribution_type.edit',$examdist->slug) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('exam_mark_distribution_type.destroy',$examdist->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Mark Distribution Type'); ">
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
