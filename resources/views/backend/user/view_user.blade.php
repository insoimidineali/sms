@extends('admin.admin_master')
@section('admin')
<meta name="csrf-token" content="{{ csrf_token() }}">

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">User List</h3>
				  {{-- {{ route('users.add') }} --}}
	<a href="{{ route('users.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add User</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Role</th>
				<th>Name</th>
				<th>Email</th>
				<th>Code</th>
				<th width="25%">Action</th>

			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $user )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $user->role }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->code }}</td>
				<td>
                       @if(Auth::user()->usertype == 'Admin')

                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-small">Edit</a>
                <a href="{{ route('users.delete',$user->id) }}" class="btn btn-danger"  id="delete">Delete</a>
                       @endif
                <a href="{{ route('chat.view', ['receiver_id' => base64_encode($user->id)]) }}" class="btn btn-outline btn-rounded btn-success mb-5 btn-sm">Send Message</a>


				</td>

			</tr>
			@endforeach

						</tbody>
						<tfoot>

						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>





@endsection
