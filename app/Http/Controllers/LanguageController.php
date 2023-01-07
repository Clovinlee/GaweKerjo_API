<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\user_language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function getLanguages(){
        return Language::all();
    }

    public function getUserLanguages(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $l = user_language::all();
        try {
            if($id != null){
                $l = $l->where("id",$id);
            }
            if($user_id != null){
                $l = $l->where("user_id",$user_id);
            }
            $l = $l->values();
            return makeJson(200, "Success get user language", $l);
        } catch (\Throwable $th) {
            return makeJson(200, "Error get user language", $th->getMessage());
        }
    }

    public function addUserLanguages(Request $r){
        $user_id = $r->user_id;
        $name = $r->name;
        try {
            $l = new user_language();
            $l->user_id = $user_id;
            $l->name = $name;
            $l->save();

            return makeJson(200,"Success add user language",$l);
        } catch (\Throwable $th) {
            return makeJson(400,"Error add user language",$th->getMessage());
        }
    }
}
