@extends('admin.admin_master')
@section('admin')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}


{{-- <div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                 <div class="col-12">
                     <div class="box bb-3 border-warning">
                            <div class="box-header">
                            <h4 class="box-title">Student <strong>Marsk Entry</strong></h4>
                            </div>
                        <div class="box-body">
                            <div class="col-6">

                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="firstName5">First Name :</label>
                                    <input type="text" class="form-control" id="firstName5">

                                </div>

                            </div>
                            <div class="col-6">
                            <div class="form-group">

                                <input type="button" class="btn btn-rounded btn-info mb-5" style="margin: 10%" value="Add Category ">

                              </div>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>

        </section>
    </div>
</div> --}}


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">


<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
	 <h4 class="box-title">Add <strong>Category Books</strong></h4>
				  </div>

				  <div class="box-body">
{{--  --}}
 <form method="POST" action="{{ route("ad_category") }}">
			@csrf
		<div class="row">
            @if(Auth::user()->role == "Admin")

            <div class="col-md-4">

                <div class="form-group">
                <h5>Category Name <span class="text-danger"> </span></h5>
                    <div class="controls">
                        <div class="form-group">
                            {{-- <label for="firstName5">First Name :</label> --}}
                            <input type="text" class="form-control" name="category" required>

                        </div>
                </div>
                </div>

 			</div> <!-- End Col md 4 -->
 			<div class="col-md-4" style="padding-top: 25px;" >
            <input type="submit" class="btn btn-rounded btn-primary" value="Add category Book">


 			</div> <!-- End Col md 4 -->
             @endif
             <div class="box">
				<div class="box-header with-border">
				  {{-- <h4 class="box-title">Responsive Hover Table</h4> --}}
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
						  <th>Category Name</th>
						  {{-- <th>User</th> --}}
						  <th>Date</th>
                        @if(Auth::user()->usertype == "Admin")

						  <th>Action </th>
                          @endif
						  {{-- <th>Status</th>
						  <th>Country</th> --}}
						</tr>
                        @foreach ($data as $item)

						<tr>
                            <td>{{ $item->cat_title }}</td>
                            <td>{{ $item->created_at }}</td>

                        @if(Auth::user()->role == "Admin" || Auth::user()->usertype == 'Teacher')
                            <td>

                                    <a href="{{ route('cat_delete', $item->id) }}"

                                        class="badge badge-pill badge-danger"  id="delete">Delete
                                    </a>
                                    <a href="{{ route('Edit_Category', $item->id) }}"

                                        class="badge badge-pill badge-warning" >Update
                                    </a>

                            </td>
                        @endif

						</tr>
                        @endforeach

					  </tbody></table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>

		</div><!--  end row -->



		</form>


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>




@endsection
