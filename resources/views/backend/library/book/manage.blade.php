@extends('backend.master')

@section('title')
    Library Book
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Library Book', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Library Book</h4>
                    <a href="{{ route('library_book.create') }}" class="btn btn-success float-end">
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
                                <th>Library Book Category </th>
                                <th>Name</th>
                                <th>Author Name</th>
                                <th>Publisher Name</th>
                                <th>Book Code</th>
                                <th>Price</th>
                                <th>Quantity </th>
                                <th>Due Quantity</th>
                                <th>Cover Image</th>
                                <th>Self No</th>
                               <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->libraryBookCategory->name }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->author_name }}</td>
                                    <td>{{ $book->publisher_name }}</td>
                                    <td>{{ $book->book_code }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->due_quantity }}</td>
                                    <td>
                                        <a class="image-popup" href="{{asset($book->cover_image)}}">
                                            <img src="{{asset($book->cover_image)}}" style="height: 80px;width: 80px" alt="">
                                        </a>
                                        </td>
                                    <td>{{ $book->self_no }}</td>
                                   <td>{{ $book->status == 0 ? 'Unpublished' : 'Publishid' }}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$book->id)}}" class="btn btn-{{$book->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$book->status==0? 'down':'up'}}"></i></a>--}}
                                        <div class="d-flex">
                                        <a href="{{ route('library_book.edit', $book->slug) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('library_book.destroy', $book->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Book'); ">
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

