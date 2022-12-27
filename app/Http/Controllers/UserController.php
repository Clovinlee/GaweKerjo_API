<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
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

    public function register(Request $r){
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
}
