<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\user_skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //
    public function addUserSkill(Request $r){
        $uskil = new user_skill();
        $uskil->user_id = $r->user_id;
        $uskil->skill_id = $r->skill_id;
        $uskil->save();
        return $uskil;    
    }

    public function getUserSkill(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $skill_id = $r->skill_id;

        $skill = user_skill::all();
        if($id != null){
            $skill = $skill->where("id",$id);
        }
        if($user_id != null){
            $skill = $skill->where("user_id",$user_id);
        }
        if($skill_id != null){
            $skill = $skill->where("skill_id",$skill_id);
        }
        $skill = $skill->values();
        return $skill;

    }

    public function getSkills(){
        return Skill::all();
    }
}
