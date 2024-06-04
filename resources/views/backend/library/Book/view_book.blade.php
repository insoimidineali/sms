@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
           <section class="content">
                <div class="row">
                    <div class="col-12">
                            <div class="box bb-3 border-warning">
                                            <div class="box-header">
                                                <h4 class="box-title">Add <strong>Books </strong></h4>
                                            </div>

                                            <div class="box-body">



                                                    <div class="col-12">
                                                        <div class="box">
                                                        <div class="box-header with-border">
                                                            <h4 class="box-title">Book List </h4>
                                                            <div class="box-controls pull-right">
                                                            <div class="lookup lookup-circle lookup-right">
                                                                <input type="text" name="s">
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body no-padding">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover">
                                                                <tbody><tr>
                                                                    <th>Book title</th>
                                                                    <th>Author name</th>
                                                                    <th>Book Edition</th>
                                                                    <th>Quantity</th>
                                                                    <th>Book PDF</th>
                                                                    <th>Book Image</th>
                                                                    <th>Category Book</th>
                                                                    @if(Auth::user()->role == "Admin" || Auth::user()->role == 'Teacher')

                                                                    <th>Action</th>

                                                                    @endif


                                                                </tr>
                                                                @foreach ($data as $item )
                                                                <tr>
                                                                    <td>{{ $item->title }}</td>
                                                                    <td>{{ $item->author_name }}</td>
                                                                    <td>{{ $item->edition }}</td>
                                                                    <td>{{ $item->Quantity }}</td>
                                                                        <td>
                                                                            <a href="{{ asset('books/pdf/' . $item->BookPDF) }}" class="btn btn-primary .btn-rounded" download><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                                                                        </td>

                                                                    <td>
                                                                        {{-- <img style="width: 50px"  src="books/images{{ $item->Book_image }}"> --}}
                                                                        <img style="width: 60px" src="{{ asset('books/images/' . $item->Book_image) }}">

                                                                    </td>
                                                                    <td>{{ $item->category->cat_title }}</td>

                                                                    <td>

                                                                        @if(Auth::user()->role == "Admin" || Auth::user()->role == 'Teacher')
                                                                       <a href="{{ route('library.book.book_edit', $item->id) }}" class="btn btn-info">Edit</a>

                                                                       <a href="{{ route('library.book.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>

                                                                       @endif
                                                                       {{-- {{ route('employee.registration.details',$employee->id) }} --}}
                                                                       {{-- {{ route('Book_Dleete', $item->id) }} --}}


                                                                   </td>
                                                                </tr>
                                                                @endforeach


                                                                </tbody></table>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                        </div>
                                                        <!-- /.box -->
                                                    </div>































                                            </div>
                                            <!-- /.col -->
                                            </div>
                                    </div>
                                </div>
                <!-- /.row -->
                            </section>
                <!-- /.content -->

                    </div>
                </div>
                @endsection
