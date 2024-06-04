
<div class="direct-chat-msg mb-30">

    <!-- /.direct-chat-info -->
    <img class="direct-chat-img avatar" src="../images/user1-128x128.jpg" alt="message user image">
    <span class="direct-chat-name">{{ $getReceiver->name }} {{ $getReceiver->fathername }}</span>

    <!-- /.direct-chat-img -->
    <small>

    <div class="direct-chat-text">
            {{-- <p>{{ $value->message }}</p> --}}
            @if(!empty($getReceiver->OnlineUser()))
            <span style="color: greenyellow">Online</span>
            {{-- {{ $getReceiver->OnlineUser($getReceiver->id) }} --}}

            @else
            <p class="direct-chat-timestamp"><time datetime="2018"> Last seen: {{ Carbon\Carbon::parse($getReceiver->updated_at)->diffForHumans() }}</time></p>

            @endif
        </div>
    </small>

<!-- /.direct-chat-text -->
</div>
