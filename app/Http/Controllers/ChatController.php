<?php

namespace App\Http\Controllers;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class ChatController extends Controller
{
    public function index(User $user)
    {
       return view('chats/index')->with(['users'=>$user->get()]);
    }
    
    public function contents(User $user, Chat $chat)
    {
        $chats = $chat->whereIn('user_id',[$user->id,Auth::id()])->whereIn('another_id',[$user->id,Auth::id()])->get();
    
        #$chat->uidentifer = Auth::user()->id;
        #session(['uidentifer' => $chat->uidentifer]);
        return view('chats/contents')->with(['chat'=>$chats,'user'=>$user]);
    }
    
    public function store(ChatRequest $request, Chat $chat,User $user)
    {
        $input = $request['chat'];
        $chat->user_id = Auth::user()->id;
        $chat->uidentifer = Auth::user()->id;
        $chat->another_id = $user->id;
        #$chat->another_id = $users;#送信先の特定のユーザーをanather_idに代入
        
        session(['uidentifer' => $chat->uidentifer]);
        $chat->fill($input)->save();
        return redirect('/chats/'. $user->id);
        
        //
    }
    
    
    public function update(Request $request, Chat $chat )
    {
        //
    }
    
    public function delete(Chat $chat,User $user)
    {
        $chat->delete();

        return redirect('/chats/'.$user->id);
       
    }


    //
}
