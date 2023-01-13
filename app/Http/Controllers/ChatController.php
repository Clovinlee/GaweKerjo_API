<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\user_chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //

    public function friendtoDchat(Request $r)
    {
        $hchat=$r->chat_id;
        $dc=user_chat::where("chat_id",$hchat)->get();
        return makeJson(200,"Berhasil dapatkan detail chat",$dc);
    }
    public function friendtoChat(Request $r)
    {
        $user_id=$r->user_id;
        $recipient_id=$r->recipient_id;
        $chat=chat::where("user_id",$user_id)
        ->where("recipient_id",$recipient_id)
        ->first();
        if ($chat==null) {
            $chat=chat::where("user_id",$recipient_id)
            ->where("recipient_id",$user_id)
            ->first();
        }
        if ($chat==null) {
            $chat=new chat();
            $chat->user_id=$user_id;
            $chat->recipient_id=$recipient_id;
            $chat->save();
        }
        return makeJson(200,"Berhasil dapatkan chat",[$chat]);
    }
    public function addDchat(Request $r){
        $dc = new user_chat();
        $dc->user_id = $r->user_id;
        $dc->chat_id = $r->chat_id;
        $dc->message = $r->message;

        $dc->save();

        return makeJson(200,"Berhasil tambah chat",[$dc]);
    }

    public function addHchat(Request $r){
        $hc = new chat();
        $hc->user_id = $r->user_id;
        $hc->recipient_id = $r->recipient_id;
        $hc->save();

        return makeJson(200,"Berhasil tambah chat",[$hc]);
    }

    public function getDChats(Request $r){
        $user_id = $r->user_id;
        $chat_id = $r->chat_id;
        $dc = user_chat::all();
        
        if($user_id != null){
            $hc=chat::where("user_id",$user_id)
            ->orwhere("recipient_id",$user_id)
            ->get();
            $dc=[];
            foreach ($hc as $key => $c) {
                foreach ($c->dchat as $key => $d) {
                    array_push($dc,$d);
                }
            }
        }
        if($chat_id != null){
            $dc = $dc->where("chat_id",$chat_id);
        }

        return makeJson(200,"Berhasil dapatkan detail chat",$dc);
    }

    public function getHChats(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $recipient_id = $r->recipient_id;
        try {
            $hc = chat::all();

            if($id != null){
                $hc = $hc->where("id",$id);
            }
            if($user_id != null){
                
                $hc = chat::where("user_id",$user_id)
                ->orwhere("recipient_id",$user_id)
                ->get();
                
            }
            if($recipient_id != null){
                $hc = $hc->where("recipient_id", $recipient_id);
            }
            if(count($hc)==0){
                $hc=[];
            }
            return makeJson(200,"Berhasil dapatkan chat",$hc);
        } catch (\Throwable $th) {
            //throw $th;
            return makeJson(400,"Gagal dapatkan chat",null);
        }
    }
}
