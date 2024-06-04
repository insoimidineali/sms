<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-9 col-12">
    <div class="box direct-chat">
        <div class="box-header with-border">
        <h4 class="box-title">Chat Message</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <!-- Conversations are loaded here -->
        @include('backend.chat._chat')
        <!--/.direct-chat-messages-->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <form action="" id="submit_message_form" method="POST">
            <input type="text" value="{{ $getReceiver->id }}" name="receiver_id" >
            {{ csrf_field() }}
            {{-- @csrf --}}
            <div class="input-group">
                <textarea required name="message" id="ClearMessage" placeholder="Type Message ..." class="form-control"></textarea>
                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" value="send">
                </div>
            </div>
        </form>
        {{-- <form id="submit_message_form" method="POST" action="{{ route('submit_message') }}">
            @csrf
            {{ csrf_field() }}
            <textarea name="message" placeholder="Type Message ..." class="form-control"></textarea>
            <input type="submit" class="btn btn-primary" style="margin-top: 10px;" value="Send">
        </form> --}}
        </div>
        <!-- /.box-footer-->
    </div>
</div>
