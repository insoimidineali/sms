@foreach ($getChat as $value)
@if($value->sender_id == Auth::user()->id)



<!-- Message to the right -->
<div class="direct-chat-msg right mb-30">
    <div class="clearfix mb-15">
        <span class="direct-chat-name pull-right">You</span>
    </div>
    <div class="direct-chat-text">
         <p>{{ $value->message }}</p>
        <p class="direct-chat-timestamp"><time datetime="2018">{{ Carbon\Carbon::parse($value->updated_at)->diffForHumans() }}</time></p>
    </div>
<!-- /.direct-chat-text -->
</div>
<!-- /.direct-chat-msg -->





@else

{{-- <!-- Message to the right -->
                <div class="direct-chat-msg right mb-30">
                        <div class="clearfix mb-15">
                            <span class="direct-chat-name pull-right">You</span>
                        </div>
                        <div class="direct-chat-text">
                             <p>{{ $value->message }}</p>
                            <p class="direct-chat-timestamp"><time datetime="2018">{{ Carbon\Carbon::parse($value->updated_at)->diffForHumans() }}</time></p>
                        </div>
                <!-- /.direct-chat-text -->
                </div>
<!-- /.direct-chat-msg --> --}}


<div class="direct-chat-msg mb-30">


    <!-- /.direct-chat-info -->
    <img class="direct-chat-img avatar" src="../images/user1-128x128.jpg" alt="message user image">
    <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
            <p>{{ $value->message }}</p>
           <p class="direct-chat-timestamp"><time datetime="2018">{{ Carbon\Carbon::parse($value->updated_at)->diffForHumans() }}</time></p>
        </div>
<!-- /.direct-chat-text -->
</div>
<!-- /.direct-chat-msg -->
@endif

@endforeach
