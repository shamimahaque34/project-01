@extends('backend.master')

@section('title')
    Manage Designation
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Designation', 'child' => 'Manage'])
@endsection


@section('body')
    <section class="py-5">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-capitalize float-start">Manage designation</h4>
                        <a href="{{ route('designation.create') }}" class="btn btn-success float-end">
                            Create
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Bangla Title</th>
                                <th>Position Number</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($designations as $designation)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$designation->title}}</td>
                                    <td>{{$designation->title_bangla}}</td>
                                    <td>{{$designation->position_number}}</td>
                                    <td>{{$designation->slug}}</td>
                                    <td>{{$designation->status==1?'Published':'Unpublished'}}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('designation.show',$designation->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>

                                        <a href="{{route('designation.edit',$designation->id)}}" class="btn btn-sm btn-info ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{route('designation.destroy',$designation->id)}}" method="post" style="display:inline-block" onsubmit="return confirm('Are You Sure?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn ms-2 btn-sm btn-danger"><i class="dripicons-trash"></i></button>
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
    </section>
@endsection
