 @php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();

 @endphp

{{-- @dd($prefix) --}}
 <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>S . M . S </b></h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

	    	<li class="{{ ($route == 'dashboard')?'active':'' }}" >
            <a href="{{ route('dashboard') }}">
              <i data-feather="pie-chart"></i>
              <span>Dashboard</span>
            </a>
        </li>

    @if(Auth::user()->usertype == 'Admin')
        <li class="treeview {{ ($prefix == 'users')?'active':'' }} " >
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('users.view') }}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('users.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li>
    @endif


        <li class="treeview {{ ($prefix == 'profile')?'active':'' }}">
          <a href="#">
            <i data-feather="grid"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            {{-- {{ route('profile.view') }} --}}
            {{-- {{ route('password.view') }} --}}
            <li>
                @if(Auth::user()->usertype == 'Student')
                <li class="{{ ($prefix == 'users') ? 'active' : '' }}">
                    <a href="{{ route('users.view') }}">
                        <i class="ti-more"></i>View User
                    </a>
                </li>
            @endif
            </li>
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href=" {{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>

          </ul>
        </li>


        @if(Auth::user()->role == 'Admin' )
            <li class="treeview {{ ($prefix == 'setups')?'active':'' }}">
                    <a href="#">
                        <i data-feather="credit-card"></i> <span>System Configuration</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- Student Class Student Year Student Department --}}
                        <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>School Class</a></li>
                        {{-- <li><a href="{{ route('student.terms.view') }}"><i class="ti-more"></i>Academic terms</a></li> --}}
                        <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>School Year</a></li>
                        <li><a href="{{ route('student.streams.view') }}"><i class="ti-more"></i>School Streams</a></li>
                        <li><a href="{{ route('student.section.view')}}"><i class="ti-more"></i>Student shift</a></li>
                        <li><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>School Bills</a></li>
                        <li><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Amount</a></li>
                        <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
                        <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Subjects</a></li>
                        <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Suject</a></li>
                        <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation </a></li>
                    </ul>
            </li>
        @endif


            <li class="treeview {{ ($prefix == 'students')?'active':'' }}">
                    <a href="#">
                        <i data-feather="hard-drive"></i></i> <span>Student Management</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>
                        @if(Auth::user()->role == 'Admin' )
                        <li><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a></li>
                        @endif
                        <li><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration fee </a></li>
                        <li><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee </a></li>
                        <li><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee </a></li>
                        <li><a href="{{ route('student.marks.view') }}"><i class="ti-more"></i>Student Marks View </a></li>
                    </ul>
            </li>

      @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teacher')
                <li class="treeview {{ ($prefix == '/teachers')?'active':'' }}">
                        <a href="#">
                            <i data-feather="package"></i> <span>Teacher Management</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <li class="{{ ($route == 'teacher.registration.view')?'active':'' }}">
                            <a href="{{ route("teacher.registration.view") }}"><i class="ti-more"></i>Teacher Registration</a></li>

                            {{-- <li  class="{{ ($route == 'employee.salary.view')?'active':'' }}"><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li> --}}

                           {{-- <li><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>--}}
                            <li><a href="{{ route('student.attendance.view') }}"><i class="ti-more"></i> Attendance</a></li>
                            {{-- <li><a href="{{ route('employee.monthly.salary') }}"><i class="ti-more"></i>Employee Monthly Salary</a></li> --}}


                            </ul>
                            </li>
         @endif

        @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teacher')
                <li class="treeview {{ ($prefix == '/marks')?'active':'' }}">
                    <a href="#">
                        <i data-feather="edit-2"></i> <span> Marks Management</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'marks.entry.add')?'active':'' }}">
                    <a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Marks Entry</a></li>
                    <li class="{{ ($route == 'marks.entry.edit')?'active':'' }}">
                        <a href="{{ route("marks.entry.edit") }}"><i class="ti-more"></i>Marks Edit</a></li>

                        <li class="{{ ($route == 'marks.entry.grate')?'active':'' }}">
                            <a href="{{ route("marks.entry.grade") }}"><i class="ti-more"></i>Marks Grade</a></li>

                    {{-- <li> <a href="{{ route("marks.entry.edit") }}"><i class="ti-more"></i>Marks Edit</a></li> --}}
            {{-- {{ route("marks.entry.edit") }} --}}
                    {{--<li class="{{ ($route == 'marks.entry.edit')?'active':'' }}"><a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Marks Edit</a></li> --}}

                {{-- <li class="{{ ($route == 'marks.entry.grade')?'active':'' }}"><a href="{{ route('marks.entry.grade') }}"><i class="ti-more"></i>Marks Grade</a></li>  --}}


                    </ul>
                    </li>
              @endif



            <li class="treeview {{ ($prefix == '/chat')?'active':'' }}">
                    <a href="#">
                        <i data-feather="inbox"></i> <span> Chat</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                    <li class="{{ ($route == 'chat.view')?'active':'' }}"><a href="{{ route('chat.view') }}"><i class="ti-more"></i>Chat</a></li>
                    {{-- <li class="{{ ($route == 'account.salary.view')?'active':'' }}"><a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li> --}}
                    {{-- <li class="{{ ($route == 'other.cost.view')?'active':'' }}"><a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Other Cost</a></li> --}}


                    </ul>
                    </li>


                    {{-- <li class="header nav-small-cap">Under Construction</li> --}}

                <li class="treeview {{ ($prefix == '/reports')?'active':'' }}">
                    <a href="#">
                        <i data-feather="server"></i></i> <span> Reports</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                    {{-- <li class="{{ ($route == 'monthly.profit.view')?'active':'' }}"><a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly-Yearly Profite</a></li>--}}

                    <li class="{{ ($route == 'marksheet.generate.view')?'active':'' }}"><a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>MarkSheet Generate</a></li>

                    <li class="{{ ($route == 'attendance.report.view')?'active':'' }}"><a href="{{ route('report.attendence.view') }}"><i class="ti-more"></i>Attendance Report</a></li>
                    <li class="{{ ($route == 'student.idcard.view')?'active':'' }}"><a href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student ID Card </a></li>
                    {{-- <li class="{{ ($route == 'student.result.view')?'active':'' }}"><a href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Result </a></li>

                    <li class="{{ ($route == 'student.idcard.view')?'active':'' }}"><a href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student ID Card </a></li> --}}
                    </ul>
                 </li>

                 <li class="treeview {{ ($prefix == '/library')?'active':'' }}">
                    <a href="#">
                        <i data-feather="server"></i></i> <span> Library</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                    {{-- <li class="{{ ($route == 'monthly.profit.view')?'active':'' }}"><a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly-Yearly Profite</a></li>--}}
                    <li class="{{ ($route == 'library.library.view')?'active':'' }}"><a href="{{ route('library.library.view') }}"><i class="ti-more"></i>Category</a>
                    </li>
                    @if(Auth::user()->role == "Admin" || Auth::user()->role == 'Teacher')

                    <li class="{{ ($route == 'library.library.add_book')?'active':'' }}"><a href="{{ route('library.library.add_book') }}"><i class="ti-more"></i>Add book </a>
                    </li>
                    @endif


                    <li class="{{ ($route == 'library.book.view')?'active':'' }}"><a href="{{ route('library.book.view') }}"><i class="ti-more"></i>View book</a></li>


                </ul>
                 </li>


      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
