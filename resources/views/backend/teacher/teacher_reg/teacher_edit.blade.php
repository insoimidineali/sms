@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Teacher </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                    {{-- {{ route('update.employee.registration',$editData->id) }} --}}
	 <form method="post" action="{{ route('update.teacher.registration',$editData->id) }} --}}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row">
						<div class="col-12">



 		           <div class="row"> <!-- 1st Row -->

                                    <div class="col-md-4">

                                <div class="form-group">
                                <h5>Teacher Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                            <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}" >
                            </div>
                            </div>

                                    </div> <!-- End Col md 4 -->


                            <div class="col-md-4">

                                <div class="form-group">
                                <h5>Father's Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                            <input type="text" name="fathername" class="form-control" required="" value="{{ $editData->fathername }}">
                            </div>
                            </div>

                                    </div> <!-- End Col md 4 -->



                            <div class="col-md-4">

                                <div class="form-group">
                                <h5>Mother's Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                            <input type="text" name="mothername" class="form-control" required="" value="{{ $editData->mothername }}">
                            </div>
                            </div>

                                    </div> <!-- End Col md 4 -->


 		            </div> <!-- End 1stRow -->

	                <div class="row"> <!-- 2nd Row -->

                            <div class="col-md-4">

                                <div class="form-group">
                                <h5>Mobile Number <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="mobile" class="form-control" required="" value="{{ $editData->mobile }}" >
                                </div>
                                </div>

                            </div> <!-- End Col md 4 -->


                            <div class="col-md-4">
                                <div class="form-group">
                                <h5>Address <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                <input type="text" name="address" class="form-control" required="" value="{{ $editData->address }}" >
                                </div>
                                </div>
                            </div> <!-- End Col md 4 -->
                            <div class="col-md-4">

                                <div class="form-group">
                                <h5>Gender <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <select name="gender" id="gender" required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Gender</option>
                                    <option value="Male" {{ ($editData->gender == 'Male')? 'selected': '' }} >Male</option>
                                    <option value="Female" {{ ($editData->gender == 'Female')? 'selected': '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- End Col md 4 -->
 		            </div> <!-- End 2nd Row -->

                                <div class="row"> <!-- 3rd Row -->

                                          {{-- <div class="col-md-4"> --}}

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                            <input type="email" name="email" class="form-control" required=""  value="{{ $editData->email }}">
                                            </div>
                                            </div>

                                          </div> <!-- End Col md 4 -->
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                    <h5>Designation <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="designation_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select designation</option>
                                                        @foreach($designation as $desi)
                                                            <option value="{{ $desi->id }}" {{ ($editData->designation_id == $desi->id)?'selected':'' }} >{{ $desi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                           </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                        <h5>Select Stream <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="stream_id" id="gender" required="" class="form-control">
                                                                @foreach($streams as $stream)
                                                                {{-- <option value="{{ $stream->id }}">{{ $stream->name }}</option> --}}
                                                                <option value="{{ $stream->id }}" {{ ($editData->stream_id == $stream->id)?'selected':'' }} >{{ $stream->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                    </div> <!-- End Col md 4 -->



                                    <div class="row"> <!-- 3rd Row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Salary <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="salary" class="form-control" required=""   value="{{ $editData->salary }}">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Religion <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                    <select name="religion" id="religion" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Religion</option>

                                                            <option value="Islam"{{ ($editData->religion == 'Islam')? 'selected': '' }}>Islam</option>
                                                            <option value="Hindu" {{ ($editData->religion == 'Hindu')? 'selected': '' }}>Hindu</option>
                                                            <option value="Christan" {{ ($editData->religion == 'Christan')? 'selected': '' }}>Christan</option>
                                                    </select>
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->
                                            <div class="col-md-4">
                                                @if(!$editData)
                                                <div class="form-group">
                                                        <h5>Select year <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="year" id="year" required="" class="form-control">
                                                                @foreach($years as $year)
                                                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                                @endif
                                            </div>
                                            <!-- End Col md 4 -->
                                            <!-- End Col md 4 -->
                                    </div> <!-- End 3rd Row -->


                                    <div class="row"> <!-- 4TH Row -->
                                        @if(!$editData)
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="birthday" class="form-control" required=""  value="{{ $editData->birthday }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        <!-- End Col md 3 -->
                                                @if(!$editData)
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                                <h5>Joining Date <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="date" name="join_date" class="form-control" required="" value="{{ $editData->join_date }}">
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Col md 3 -->
                                                @endif

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                            <h5>Profile Image <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                        <input type="file" name="images" class="form-control" id="image" >  </div>
                                                    </div>
                                                    </div> <!-- End Col md 3 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <div class="controls">
	                                                        	{{-- <img id="showImage" src="{{ (!empty($editData->image))? url('upload/teachers_images/'.$editData->images):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> --}}
	                                                                <img id="showImage" src="{{ (!empty($editData->images))? url('upload/teachers_images/'.$editData->images):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">

                                                                </div>
                                                         </div>
                                                     </div> <!-- End Col md 3 -->
                                                 </div>



                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                 <input type="date" name="dob" class="form-control" required="" value="{{ $editData->dob }}"  >
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 4 -->
                                         <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Designation <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                       <select name="designation_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                         @foreach($designation as $desi)
                                                        <option value="{{ $desi->id }}" {{ ($editData->designation_id == $desi->id)?'selected':'' }} >{{ $desi->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col md 4 --> --}}


 		</div> <!-- End 3rd Row -->




{{-- <div class="row"> <!-- 4TH Row -->

@if(!@editData)
<div class="col-md-3">

 		 <div class="form-group">
		<h5>Salary <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="salary" class="form-control" required="" value="{{ $editData->salary }}" >
	  </div>
	  </div>

 			</div> <!-- End Col md 3 -->
@endif --}}


 {{-- @if(!@editData)
 		<div class="col-md-3">

 		<div class="form-group">
		<h5>Joining Date <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="join_date" class="form-control" required="" value="{{ $editData->join_date }}">
	  </div>
	  </div>

 			</div> <!-- End Col md 3 -->
@endif --}}

           {{-- <div class="col-md-3">

<div class="form-group">
		<h5>Profile Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" id="image" >  </div>
	 </div>
 --}}

 			{{-- </div> <!-- End Col md 3 -->


 			<div class="col-md-3">

 		 <div class="form-group">
		<div class="controls">
		<img id="showImage" src="{{ (!empty($editData->image))? url('upload/employee_images/'.$editData->image):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">

	 </div>
	 </div>

 			</div> <!-- End Col md 3 --> --}}


 		{{-- </div> <!-- End 4TH Row --> --}}



						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>





	  </div>
  </div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>



@endsection