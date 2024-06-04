<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
@extends('admin.admin_master')
{{-- <script src="{{ asset('backend/js/vendors.min.js') }}"></script> --}}

@section('admin_no_vendor', true)

@section('admin')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Autres balises head -->
</head>

<div class="content-wrapper">
    <div class="container-full">

                                <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="box">
                                    <div class="box-header with-border p-0">
                                        <div class="form-element lookup">
                                            <input class="form-control p-20 w-p100" type="text" placeholder="Search Contact">
                                        </div>
                                    </div>
                                    <div class="box-body p-0">

                                        @include('backend.chat._user')


                                    </div>
                                </div>
                            </div>

                            @if (!empty($getReceiver))

                            @include('backend.chat._messages')

                                @else

                            @endif




                        </div>
                    </section>


    </div>
</div>
@endsection

{{-- SCRIPT  --}}


{{-- @section('scripts') --}}

<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });




        $('body').on('submit', '#submit_message_form', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('submit_message') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    // Traiter la réponse
                    $("#AppendMessage").append(data.success);
                    $('#submit_message_form')[0].reset();
                    $(".ClearMessage").val('')
                    scrolDown();
                    location.reload();
                    // console.log('Success:', data);
                },

                error: function(xhr, status, error) {
                    console.log('Status:', status);
                    console.log('Error:', error);
                    console.log('Response:', xhr.responseText);
                }
            });
        });
    });

    function scrolDown(){
        $('.slimScrollBar').animate({scrolDown: $('.slimScrollBar').prop("scrolHeight")+3000}, 500)
    }
    scrolDown();
</script>

{{-- @endsection --}}




{{-- <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script> --}}
{{-- <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script> --}}

{{-- <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
 --}}

	<!-- Sunny Admin App -->
	{{-- <script src="{{ asset('backend/js/template.js') }}"></script>
	<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script> --}}

{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('body').on('submit', '#submit_message', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('submit_message') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    // Traiter la réponse
                },
                error: function(data) {
                    // Traiter l'erreur
                }
            });
        });
    });
</script> --}}
