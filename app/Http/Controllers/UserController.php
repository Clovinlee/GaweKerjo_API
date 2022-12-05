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
        return $usr;
    }

    public function register(Request $r){
        $user=new User;
        $user->name=$r->name;
        $user->email=$r->email;
        $user->password=$r->password;
        $user->save();
        return $user;
    }
}
