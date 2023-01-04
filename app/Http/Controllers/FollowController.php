<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;

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

    public function addFollows(Request $r){
        $f=new Follow();
        $f->user_id=$r->user_id;
        $f->follow_id=$r->follow_id;
        $f->save();
        return makeJson(200,"Sukses add follow",[$f]);
    }
}