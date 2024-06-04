@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">


<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
	 <h4 class="box-title">Manage <strong>Student Attendance Report</strong></h4>
				  </div>

				  <div class="box-body">
{{--  --}}
 <form method="POST" action="{{ route("update_category", $data->id) }}">
			@csrf
		<div class="row">
            <div class="col-md-4">

                <div class="form-group">
                <h5>Category Name <span class="text-danger"> </span></h5>
                    <div class="controls">
                        <div class="form-group">
                            {{-- <label for="firstName5">First Name :</label> --}}
                            <input type="text" class="form-control" name="category" value="{{ $data->cat_title }}">

                        </div>
                </div>
                </div>

 			</div> <!-- End Col md 4 -->
 			<div class="col-md-4" style="padding-top: 25px;" >
                 <input type="submit" class="btn btn-rounded btn-primary" value="Add category Book">
 			</div> <!-- End Col md 4 -->
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
