@extends('backend.master')

@section('title')
    Book Categories
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Book Categories', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Book Categories</h4>
                    <a href="{{ route('library_book_category.create') }}" class="btn btn-success float-end">
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
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookcategorys as $bookcategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bookcategory->name }}</td>
                                    <td>{{ $bookcategory->status == 0 ? 'Unpublished' : 'Publishid' }}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$bookcategory->id)}}" class="btn btn-{{$bookcategory->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$bookcategory->status==0? 'down':'up'}}"></i></a>--}}
                                        <a href="{{ route('library_book_category.edit', $bookcategory->slug) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('library_book_category.destroy', $bookcategory->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Category'); ">
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

