@extends('backend.master')

@section('title')
    Quran Chapter
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Chapter', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Quran Chapter</h4>
                    <button type="button" class="btn btn-sm btn-success float-end" id="createButton">Create</button>
                    {{-- <a href="{{ route('chapters.create') }}" class="btn btn-success float-end">
                        Create
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Arabic Name</th>
                                <th>Bangla Name</th>
                                <th>English Name</th>
                                <th>Chapter Serial</th>
                                <th>Total Verse</th>
                                <th>Surah Origin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="chapterData">
                                {{-- @foreach($chapters as $chapter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $chapter->arabic_name }}</td>
                                    <td>{{ $chapter->bangla_name }}</td>
                                    <td>{{ $chapter->english_name }}</td>
                                    <td>{{ $chapter->chapter_serial }}</td>
                                    <td>{{ $chapter->total_verse }}</td>
                                    <td>{{ $chapter->surah_origin }}</td>
                                    <td>{{ $chapter->status == 0 ? 'Unpublished' : 'Published' }}</td>
                                    <td>
                                        <div class="d-flex">
                                          
                                            <button type="button" class="btn btn-sm btn-info btn-sm py-0 px-1" data-bs-toggle="modal" data-bs-target="#modalButton" id="editChapter"><i class="dripicons-document-edit"></i></button>
                                           
                                            <form action="" method="post" style="display: inline-block"  onsubmit="return confirm('Are You Sure That To Delete This Chapter'); ">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"  data-id="{{ $chapter->id }}" class="btn btn-danger btn-sm py-0 px-1 deleteChapter ">
                                                    <i class="dripicons-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalButton" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="float-start cardHeaderText">Create Quran Chapter</h4>
                        {{-- <a href="{{ route('chapters.index') }}" class="btn btn-success float-end">
                            Manage
                        </a> --}}
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="" class="form" enctype="multipart/form-data">
                               
                                <div class="row mt-2">
                                    <div class="col-md-6 mb-4">
                                        <label  class="form-label">
                                            Arabic Name
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Arabic Name" data-bs-placement="right"></i>
                                        </label>
                                        <input type="text"  class="form-control" name="arabic_name" placeholder="" value="">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label  class="form-label">
                                            Bangla Name
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Bangla Name" data-bs-placement="right"></i>
                                        </label>
                                        <input type="text"  class="form-control" name="bangla_name" placeholder="" value="">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label  class="form-label">
                                            English Name
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set English Name" data-bs-placement="right"></i>
                                        </label>
                                        <input type="text"  class="form-control" name="english_name" placeholder="" value="">
                                    </div>


                               
                                    <div class="col-md-6 mb-4">
                                        <label  class="form-label">
                                            Chapter Serial
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set English Name" data-bs-placement="right"></i>
                                        </label>
                                        <input type="text"  class="form-control" name="chapter_serial" placeholder="" value="">
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label  class="form-label">
                                            Total Verse
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Total Verse" data-bs-placement="right"></i>
                                        </label>
                                        <input type="text"  class="form-control" name="total_verse" placeholder="" value="">
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Surah Origin</label>
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select Surah Origin" data-bs-placement="right"></i>
                                        <select name="surah_origin" class="form-control">
                                            <option value="">Select a Surah Origin</option>
                                            <option value="makki" >Makki</option>
                                            <option value="madani" >Madani</option>
                                        </select>
                                       
                                    </div>

                              
                                    <div class="mb-4">
                                        <div class="d-flex">
                                        <label for="" class="me-3">
                                            Status
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                        </label>
                                      
                                        <label for=""class="mt-0"> 
                                            <input type="checkbox" class="me-1" id="switch3"  data-switch="bool"  name="status">
                                            <label for="switch3" data-on-label="On" data-off-label="Off"></label>
                                       
                                </div>
                            </div>
                            <div class="mt-5 float-end">
                                <button type="button" class="btn btn-success btn-submit">Create Chapter</button>
                            </div>
                        </div>

                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
        </div>
    </div>
    
    @section('script')
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    

     $(document).on('click', ".btn-submit", function (e) {
        e.preventDefault();

        var data = $('.form').serialize();
        // console.log(data);
        var url = '{{ route('chapters.store') }}';
        $.ajax({
                method:'POST',
                url:url,
                data:data,
                dataType: 'JSON',
                success: function (response){
                    if(response.success){
                //   alert(response.message); 
                // window.location.reload();
                $('#modalButton').modal('hide');
                        getAllQuranData();
                        toastr.success(response.success);
                 
                    }else{
                        alert("Error")
                    }
                
                },
                
                error: function (error) {
                    console.log(error);
                }

               
            }); 
    });
    const BASEURL = {!! json_encode(url('/')) !!}+"/";
    $(document).ready(function () {
        getAllQuranData();
    });

    function getAllQuranData ()
    {
        $.ajax({
            url: BASEURL+'admin/chapters',
            method: "GET",
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                var tr = '';
                $.each(data, function(key, value) {
                    tr += '<tr>';
                    tr += '<td>'+(++key)+'</td>';
                    tr += '<td>'+value.arabic_name+'</td>';
                    tr += '<td>'+value.bangla_name+'</td>';
                    tr += '<td>'+value.english_name+'</td>';
                    tr += '<td>'+value.chapter_serial+'</td>';
                    tr += '<td>'+value.total_verse+'</td>';
                    tr += '<td>'+value.surah_origin+'</td>';
                    tr += '<td>'+value.status+'</td>';
                    tr += '<td>'; 
                        tr += '<button type="button" class="btn btn-sm btn-info btn-sm py-0 px-1 edit-chapter" data-id="'+value.id+'" ><i class="dripicons-document-edit"></i></button>';
                        tr += '<button type="button" class="btn btn-sm btn-danger btn-sm py-0 px-1 delete-chapter"  data-id="'+value.id+'"><i class="dripicons-trash"></i></button>';
                        tr += '</td>';
                    tr += '</tr>';
                })
                $('#chapterData').empty().append(tr);
              

            } 
        })
    }


    $(document).on('click', ".edit-chapter", function () {
        event.preventDefault();
        var chapterId = $(this).attr('data-id');
        $.ajax({
                method:'GET',
                url:BASEURL+'admin/chapters/'+chapterId+'/edit',
                data:{id:chapterId},
                dataType: 'JSON',
                success: function (response){
                    console.log(response);
                    var form = $('.form'); 
                   form.attr('action', BASEURL+'admin/chapters/'+response.chapter.id);   
                   form.attr('method', 'put');                 
                //    form.append('<input type="hidden" name="_method" value="put">');
                   $('input[name="arabic_name"]').val(response.chapter.arabic_name);
                   $('input[name="bangla_name"]').val(response.chapter.bangla_name);
                   $('input[name="english_name"]').val(response.chapter.english_name);
                   $('input[name="chapter_serial"]').val(response.chapter.chapter_serial);
                   $('input[name="total_verse"]').val(response.chapter.total_verse);
                //    $('input[name="surah_origin"]').val(response.chapter.surah_origin);
                   
                   $('.btn-submit').addClass('update-button').removeClass('btn-submit');
                   $('.update-button').text('Update Chapter');
                   $('.update-button').attr('data-id', response.chapter.id);   
                    $('#modalButton').modal('show');
                    if(response.chapter.status == 1)
                    {
                        $('input[name="status"]').attr('checked', true);
                    } else {
                        $('input[name="status"]').attr('checked', false);
                    }

                    if (response.chapter.surah_origin == 'makki')
                    {
                        $('option[value="makki"]').attr('selected', 'selected');
                    }
                     else 
                    {
                        $('option[value="madani"]').attr('selected', 'selected');
                    }

                  

                    $('.cardHeaderText').text('Update Quran Chapter');
                },
                
                error: function (error) {
                    console.log(error);
                }

               
            }); 
    });

    $(document).on('click', ".update-button", function () {
        event.preventDefault();
        // var data = $('.form').serialize();
        // console.log(data);
        var chapterId = $(this).attr('data-id');

        var data = $('.form').serialize();
        // console.log(data);
      
        $.ajax({
                method:'PUT',
                url:BASEURL+'admin/chapters/'+chapterId,
                data:data,
                dataType: "JSON",
                success: function (response){
                //    console.log(response);
                $('#modalButton').modal('hide');
                        getAllQuranData();
                        toastr.success(response.success);
                 
                },
                
                error: function (error) {
                    console.log(error);
                }               
            }); 
    });

    $(document).on('click', "#createButton", function (){
         event.preventDefault();
         $('form').attr('action',BASEURL+'admin/chapters');
         $('input[name="arabic_name"]').val('');
         $('input[name="bangla_name"]').val('');
         $('input[name="english_name"]').val('');
         $('input[name="chapter_serial"]').val('');
         $('input[name="total_verse"]').val('');
         $('input[name="status"]').val('');
         $('input[name="surah_origin"]').val('');
         $('.update-button').addClass('btn-submit').removeClass('update-button');
         $('.btn-submit').text('Create Chapter');
         $('.cardHeaderText').text('Create Quran Chapter');
         $('#modalButton').modal('show');
    });

    
    $(document).on('click', ".delete-chapter", function () {
        event.preventDefault();
        var chapterId = $(this).data('id');
      
        if(confirm('Are you sure to delete this record ?')) {
       
        $.ajax({
                method:'DELETE',
                url:BASEURL+'admin/chapters/'+chapterId,
                data:{id:chapterId},
                dataType: 'JSON',
                success: function (response){
                    // write(response.success);
                    // console.log(response);
                    toastr.success(response.success);
                 

                //   alert(response.message); 
                // window.location.reload();
              
                    
                    

                        getAllQuranData ()
                    
                    },
                
                error: function (error) {
                    console.log(error);
                }
        });
    }
               
            }); 
        
   


    
        
    
    </script>
    @endsection
@endsection

