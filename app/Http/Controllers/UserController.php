<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function uploadGambar(Request $r)
    {
        try {
            $img=$r->file("uploaded_file");
            $img->storePubliclyAs("user/",$img->getClientOriginalName());
            // $id=strtok($img->getClientOriginalName(),".");
            // $user=User::find($id);
            // $user->image="user/".$img->getClientOriginalName();
            // $user->save();
        } catch (\Throwable $th) {
            return makeJson("error",$th->getMessage(),null);
        }
    }
    public function getUsers(Request $r){
        $id = $r->id;
        $email = $r->email;
        $password = $r->password;

        try {
            $usr = User::all();
            if($id != null){
                $usr = $usr->where("id",$id);
            }
            if($email != null){
                $usr = $usr->where("email",$email);
            }
            if($password != null){
                $usr = $usr->where("password",$password);
            }
            $usr = $usr->values();
            return makeJson(200, "Success get user", $usr);
        } catch (\Throwable $th) {
            return makeJson(400, "Register error, please contact administrator", null);
        }
    }

    public function searchUser(Request $r){
        $name = $r->name;
        $email = $r->email;
        $usr = User::where("name","like","%".$name."%")->where("email","like","%".$email."%")->get();
        return $usr;
    }
    public function getFriends(Request $r)
    {
        $id=$r->id;
        $chat=chat::where("user_id",$id)
        ->orwhere("recipient_id",$id)
        ->get();
        $friend=[];
        foreach ($chat as $key => $c) {
            array_push($friend,($id==$c->user_id) ? User::find($c->recipient_id) : User::find($c->user_id));
        }
        return makeJson(200,"Berhasil ambil data teman",$friend);
    }
    public function getNewFriend(Request $r)
    {
        $id=$r->id;
        $chat=chat::where("user_id",$id)
        ->orwhere("recipient_id",$id)
        ->get();
        $friend=[];
        foreach ($chat as $key => $c) {
            array_push($friend,($id==$c->user_id) ? User::find($c->recipient_id)->id : User::find($c->user_id)->id);
        }
        $new=User::whereNotIn('id',$friend)
        ->whereNot('id',$id)
        ->get();
        return makeJson(200,"Berhasil ambil data teman baru",$new);
    }
    
    public function register(Request $r){
        $usr_exist = User::where("email",$r->email)->get();
        if(count($usr_exist) > 0){
            return makeJson(400, "Error, email already used!", null);
        }

        try {
            $user=new User;
            $user->name = $r->name;
            $user->email = $r->email;
            $user->type = $r->type;
            $user->password = $r->password;

            $user->notelp = $r->notelp;

            $user->save();

            return makeJson(200, "Register Success", [$user]);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(), null);
        }
    }

    public function editProfile(Request $r){

        try {
            $user = User::find($r->id);
            $user->name = $r->name;
            $user->description = $r->description;
            $user->notelp = $r->notelp;
            $user->save();

            return makeJson(200, "Edit Success", [$user]);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(), null);
        }


    }
}
