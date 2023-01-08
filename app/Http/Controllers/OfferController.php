<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //
    public function editOffer(Request $r){
        $id = $r->id;
        $title = $r->title;
        $body = $r->body;
        $skills = $r->skills;

        try {
            $o = Offer::find($id);
            $o->title = $title;
            $o->body = $body;
            $o->skills = $skills;
            $o->save();

            return makeJson(200,"Sukses edit offer",[$o]);

        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(),null);
        }
    }

    public function deleteOffer(Request $r){
        $id = $r->id;
        try {
            $o = Offer::find($id);
            $o->delete();
            return makeJson(200,"Sukses delete offer",[$o]);
        } catch (\Throwable $th) {
            return makeJson(400,$th->getMessage(),null);
        }
    }
    
    public function getOffers(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        
        try {
            $o = Offer::all();
            if($id != null){
                $o = $o->where("id",$id);
            }
            if($user_id != null){
                $o = $o->where("user_id",$user_id);
            }

            $o = $o->values();
            return makeJson(200, "Success get offer",$o);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(),null);
        }
    }

    public function addOffer(Request $r){
        try {
            $o = new Offer();
            $o->user_id = $r->user_id;
            $o->title = $r->title;
            $o->body = $r->body;
            $o->skills = $r->skills;
            $o->save();
    
            return makeJson(200, "Success add new offer",[$o]);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(),[$o]);
        }
    }

    public function searchoffers(Request $r){
        $id = $r->id;
        $title = $r->title;
        $skills = $r->skills;
        $offer = Offer::all();
        if($title != null){
            $offer = Offer::where('title', 'like', '%' . $title . '%')->orWhere("skills","like","%".$title."%")->get();
        }
        else if($skills != null){
            $offer = Offer::where('title', 'like', '%' . $skills . '%')->orWhere('skills', 'like', '%' . $skills . '%')->get();
        }
        return makeJson(200,"Sukses get offers",$offer);
    }
}
