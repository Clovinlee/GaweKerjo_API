<?php

namespace App\Http\Controllers;

use App\Models\offer_skill;
use Illuminate\Http\Request;

class OfferSkillController extends Controller
{
    public function getOfferSkill(Request $r){
        $id = $r->id;
        $offer_id = $r->offer_id;
        
        try {
            $o = offer_skill::all();
            if($id != null){
                $o = $o->where("id",$id);
            }
            if($offer_id != null){
                $o = $o->where("offer_id",$offer_id);
            }

            $o = $o->values();
            return makeJson(200, "Success get offer skill",$o);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(),null);
        }
    }

    public function addOfferSkill(Request $r){
        try {
            $o = new offer_skill();
            $o->offer_id = $r->offer_id;
            $o->skill_id = $r->skill_id;
            $o->save();
    
            return makeJson(200, "Success add new offer skill",[$o]);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(),[$o]);
        }
    }

    public function search_offers_skill(Request $r){
        $id = $r->id;
        $offer_id = $r->user_id;
        $skill_id = $r->follow_id;
        $o = offer_skill::all();
        if($offer_id != null){
            $follow = offer_skill::where("offer_id",$offer_id)->orWhere("offer_id",$offer_id)->get();
        }
        else if($skill_id != null){
            $follow = offer_skill::where("skill_id",$skill_id)->orWhere("skill_id",$skill_id)->get();
        }
        return makeJson(200,"Sukses get follows",$follow);
    }
}
