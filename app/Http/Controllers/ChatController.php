<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ChatController extends Controller
{
    //

    public function chat(Request $request){

        $sender_id = Auth::user()->id;
        $data = [];
        if (!empty($request->receiver_id)) {

           $receiver_id = base64_decode($request->receiver_id);
           if ($receiver_id == $sender_id) {

            return redirect()->back()->with("error", "Due to somme error please try aggain");
           }
        //    Log::info('Receiver ID: ' . $receiver_id);
        //    Log::info('Sender ID: ' . $sender_id);
           chat::updateCount($sender_id, $receiver_id);
           $data['getReceiver'] = User::getSingle($receiver_id);
           $data['getChat'] = chat::getChat($receiver_id, $sender_id);
        //    dd($data['getChat']);
        //    dd( $data['getReceiver']);
        }

          $data["getChatUser"] =chat::getChatUser($sender_id);
            // dd($data["getChatUser"]);

        return view('backend.chat.chatView' , $data );
    }

    public function submit_message(Request $request){

        try {
            Log::info('submit_message called');
            Log::info('Request data:', $request->all());

            $validated = $request->validate([
                'message' => 'required|string',
            ]);

            $chat = new chat;
            $chat->sender_id = Auth::user()->id;
            $chat->receiver_id = $request->receiver_id;
            $chat->message = $request->message;
            $chat->created_date = time();
            $chat->save();

           $getChat = chat::where('id', '=',$chat->id)->get();


            // $json['Success'] = true;
            // echo json_encode($json);

            return response()->json([
                "status" => true,
                "success" => view("backend.chat._single",[

                    "getChat" => $getChat
                    ])->render(),
            ],200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function get_chat_windows(Request $request)
    {
        // dd($request->all());
        Log::info('submit_message called');
        Log::info('Request data:', $request->all());
    }
}
