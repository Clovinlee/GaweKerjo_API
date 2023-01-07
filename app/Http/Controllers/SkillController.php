<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\user_skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    //
    public function addUserSkill(Request $r){

        $uskil_exist = DB::table("user_skills")->where("user_id",'=',$r->user_id)->where("skill_id",'=',$r->skill_id)->get();
        if (count($uskil_exist) > 0) {
            # code...
            return makeJson(400, "Error, Skill sudah pernah ditambahkan!", null);
        }
        try {
            //code...
            $uskil = new user_skill();
            $uskil->user_id = $r->user_id;
            $uskil->skill_id = $r->skill_id;
            $uskil->save();
            return makeJson(200, "Berhasil tambah Skill",[$uskil]);
        } catch (\Throwable $th) {
            //throw $th;
            return makeJson(400, $th->getMessage(), null);
        }

    }

    public function getUserSkill(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $skill_id = $r->skill_id;

        try {
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

        return makeJson(200,"Berhasil ambil data skill",$skill);

        } catch (\Throwable $th) {
            return makeJson(400, "Gagal Ambil data skill", null);
        }


    }

    public function getSkills(Request $r){

        $id = $r->id;
        $name = $r->name;

        try {
            //code...
            $skill = Skill::all();
            if($id != null){
                $skill = $skill->where("id",$id);
            }
            if($name != null){
                $skill = $skill->where("name",$name);
            }

            $skill = $skill->values();
            // return $skill;
            return makeJson(200,"Berhasil ambil data skill",$skill);

        } catch (\Throwable $th) {
            //throw $th;
            return makeJson(400, "Gagal Ambil data skill", null);
        }


    }

    public function deleteuserskill(Request $r){

        $id = $r->id;
        $user_id = $r->user_id;

        try {
            //code...
            // $del = DB::table("user_skills")->where("id",'=',$id)->delete();

            $del = user_skill::find($id);
            $del->delete();
            return makeJson(200,"Berhasil hapus skill",[$del]);

        } catch (\Throwable $th) {
            //throw $th;

            return makeJson(400, "Gagal Delete Skill", null);
        }
    }


}
