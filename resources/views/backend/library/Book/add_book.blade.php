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






                            <div class="box-body wizard-content">
                                <form method="post" enctype="multipart/form-data" action="{{ route('library.book.store') }}">
			                       @csrf

                                    <!-- Step 1 -->

                                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstName5">Book Title :</label>
                                                    <input type="text" class="form-control" name="title"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lastName1">Author Name :</label>
                                                    <input type="text" class="form-control" name="author_name"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emailAddress1">Book edition :</label>
                                                    <input type="text" class="form-control" name="edition"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneNumber1">Quantity Number :</label>
                                                    <input type="tel" class="form-control" name="Quantity"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addressline1">Book pdf :</label>
                                                    <input type="file" class="form-control" name="Book_pdf"">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addressline1">Book Image :</label>
                                                    <input type="file" class="form-control" name="Book_image"">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location2">Select City :</label>
                                                    <select class="custom-select form-control" name="category_id" required>
                                                    <option value="">Select Category</option>
                                                        @foreach ($data as $item)
                                                        {{-- <option>{{ $item->cat_title }}</option> --}}
                                                        <option value="{{ $item->id }}">{{ $item->cat_title }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="col-md-6" style="margin-top: 25px">
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-rounded btn-primary" value="Submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                 </form>
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

