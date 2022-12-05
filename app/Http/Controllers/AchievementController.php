<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    //
    public function addAchievement(Request $r){
        $ach = new Achievement();
        $ach->user_id = $r->user_id;
        $ach->name = $r->name;
        $ach->description = $r->description;
        $ach->date = $r->date;
        $ach->save();
        return $ach;
    }

    public function getAchievements(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $ach = Achievement::all();
        if($id != null){
            $ach = $ach->where("id",$id);
        }
        if($user_id != null){
            $ach = $ach->where("user_id",$user_id);
        }
        $ach = $ach->values();
        return $ach;
    }
}
