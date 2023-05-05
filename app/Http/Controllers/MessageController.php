<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Favorite;
use App\Models\Favoriteline;
use App\Models\Message;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }

          $conversations = Conversation::where('recipient_id',Auth::user()->id)->orWhere('sender_id',Auth::user()->id)->orderBy('created_at','desc')->get();
          $last_conversation = Conversation::where('recipient_id',Auth::user()->id)->orWhere('sender_id',Auth::user()->id)->orderBy('created_at','desc')->first();
          if($last_conversation){
            $messages = Message::where('conversation_id',$last_conversation->id)->orderBy('created_at','asc')->get();
          }
           else{
            $messages = null;
           }

          return view('messages',compact('conversations','count_favorite_lines','messages','last_conversation'));
    }
    public function store(Request $request){
        $announcement = Property::find($request->announcement);
        $senderId = $request->sender;
        $recipientId = $request->recipient;
        $conversationExists = Conversation::where(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $senderId)
                    ->where('recipient_id', $recipientId);
        })->orWhere(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $recipientId)
                    ->where('recipient_id', $senderId);
        })->exists();

        $conversation = Conversation::where(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $senderId)
                    ->where('recipient_id', $recipientId);
        })->orWhere(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $recipientId)
                    ->where('recipient_id', $senderId);
        })->first();

        if($conversationExists){
            $message = new Message();
            $message->conversation_id = $conversation->id;
            $message->sender_id = $request->sender;
            $message->recipient_id = $request->recipient;
            $message->property_id = $request->announcement;
            $message->message = $request->message;
            $message->save();
            $data = array(
                'date' => $message->created_at->format('Y-m-d H:m'),
                'message' => $message->message ,

            );
            return $data;
        }
        else{
            $conversation = new Conversation();
            $conversation->sender_id = $request->sender;
            $conversation->recipient_id = $request->recipient;
            $conversation->property_id = $request->announcement;
            $conversation->save();
            $message = new Message();
            $message->conversation_id = $conversation->id;
            $message->sender_id = $request->sender;
            $message->recipient_id = $request->recipient;
            $message->property_id = $request->announcement;
            $message->message = $request->message;
            $message->save();

            $new_message = new Message();
            $new_message->conversation_id = $conversation->id;
            $new_message->sender_id = $request->sender;
            $new_message->recipient_id = $request->recipient;
            $new_message->property_id = $request->announcement;
            $new_message->message = 'Annonce : '.$announcement->designation;
            $new_message->save();

            $data = array(
                'date' => $message->created_at->format('Y-m-d H:m'),
                'message' => $message->message ,

            );
            return $data;
        }

    }

    public function modalMessage($announcement , $recipient){
        $sender = Auth::user()->id;
        return view('modal-add-message',compact('announcement','recipient','sender'));
    }

    public function indexMessages($id){
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }

        $conversation = Conversation::find($id);
        $user = User::find($conversation->sender_id);
        $messages = Message::where('conversation_id',$id)->get();
        $conversations = Conversation::where('recipient_id',Auth::user()->id)->orWhere('sender_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('conversation-messages',compact('messages','conversations','id','user','count_favorite_lines'));

    }
}
