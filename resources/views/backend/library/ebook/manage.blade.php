@extends('backend.master')

@section('title')
    Library Ebook
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'  Library Ebook', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Library Ebook</h4>
                    <a href="{{ route('library_ebook.create') }}" class="btn btn-success float-end">
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
                                <th>Library Book Category</th>
                                <th>Accademic Class </th>
                                <th>Name</th>
                                <th>Author Name</th>
                                <th>book Code</th>
                                <th>Price</th>
                                <th>Cover Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ebooks as $ebook)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ebook->libraryBookCategory->name }}</td>
                                    <td>{{ $ebook->academicClass->class_name }}</td>
                                    <td>{{ $ebook->name }}</td>
                                    <td>{{ $ebook->author_name }}</td>
                                    <td>{{ $ebook->book_code }}</td>
                                    <td>{{ $ebook->price }}</td>
                                    <td>
                                        <a class="image-popup" href="{{asset($ebook->cover_image)}}">
                                        <img src="{{asset($ebook->cover_image)}}" style="height: 80px;width: 80px" alt="">
                                        </a>
                                    </td>
                                    <td>{{ $ebook->status==0? 'Unpublished':'Publishid'}}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$ebook->id)}}" class="btn btn-{{$ebook->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$ebook->status==0? 'down':'up'}}"></i></a>--}}
                                        <div class="d-flex ">
                                        <a href="{{ route('library_ebook.edit', $ebook->slug) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('library_ebook.destroy', $ebook->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this EBook'); ">
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

