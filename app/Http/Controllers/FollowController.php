<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FollowController extends Controller
{
    //
    public function getFollows(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $follow_id = $r->follow_id;
        $follow = Follow::all();
        if($id != null){
            $follow = $follow->where("id",$id);
        }
        if($user_id != null){
            $follow = $follow->where("user_id",$user_id);
        }
        if($follow_id != null){
            $follow = $follow->where("follow_id",$follow_id);
        }
        $follow = $follow->values();
        return makeJson(200,"Sukses get follows",$follow);
    }

    public function searchFollows(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $follow_id = $r->follow_id;
        $follow = Follow::all();
        if($user_id != null){
            $follow = Follow::where("follow_id",$user_id)->orWhere("user_id",$user_id)->get();
        }
        else if($follow_id != null){
            $follow = Follow::where("follow_id",$follow_id)->orWhere("user_id",$follow_id)->get();
        }
        return makeJson(200,"Sukses get follows",$follow);
    }

    public function getunfriend(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $follow_id = $r->follow_id;
        $usr = User::all();
        if($user_id != null){
            $usr = User::whereNotIn("id",$user_id)->orWhereNotIn("id",$user_id)->get();
        }
        // else if($follow_id != null){
        //     $usr = User::whereNotIn("id",$follow_id)->orWhereNotIn("id",$follow_id)->get();
        // }
        return makeJson(200,"Sukses get friends/unfriends",$usr);
    }

    public function addFollows(Request $r){
        $f=new Follow();
        $f->user_id=$r->user_id;
        $f->follow_id=$r->follow_id;
        $f->save();
        return makeJson(200,"Sukses add follow",[$f]);
    }

    public function removefollows(Request $r){
        try {
            $id = $r->id;
            $f = Follow::find($id);
            $f->delete();
            return makeJson(200,"Sukses delete follow",[$f]);
        } catch (\Throwable $th) {
            return makeJson(400,$th->getMessage(),null);
        }
    }
}
