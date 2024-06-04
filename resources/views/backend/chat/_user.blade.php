<style>
    .avatar {
        display: flex;
        align-items: center;
    }

    .status-text {
        margin-left: 10px; /* Ajustez la marge selon vos besoins */
        font-size: 0.9em; /* Ajustez la taille du texte selon vos besoins */
        color: green; /* Couleur du texte "Online" */
    }
</style>
<div id="chat-contact" class="media-list media-list-hover media-list-divided ">
   @foreach ($getChatUser as $user)

    <div class="media media-single ">

    <a href="{{ url('chat?receiver_id='.base64_encode($user['user_id'])) }}" class="avatar avatar-lg">
        {{-- <img src="../images/avatar/2.jpg" alt="..."> --}}

        <img src="{{ !empty($user->user->images) ? url('upload/user_images/' . $user->user->images) : url('upload/no_image.jpg') }}" alt="...">

    </a>

    <div class="media-body">
        <h6><a href="{{ url('chat?receiver_id='.base64_encode($user['user_id'])) }}">{{ $user['name'] }}
            @if(!empty($user['messagecount'] ))

            <span style="background: green;color:#fff;border-radius: 5px; padding: 1px 7px;">{{ $user['messagecount'] }}
            </span>
            @endif

        </a></h6>
                @if(!empty($user['is_online']))
                <small class="text-green" style="color: greenyellow">Online</small>
            @else
                <small class="text-green">{{ Carbon\Carbon::parse($user['created_date'])->diffForHumans() }}</small>
            @endif
        {{-- <small class="text-green">{{ Carbon\Carbon::parse($user['created_date'])->diffForHumans() }}</small> --}}
        {{-- {{ Carbon\Carbon::parse($user['created_date'])->diffForHumans() }} --}}
    </div>
    </div>



    @endforeach





</div>
