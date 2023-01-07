<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //
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
            $o->save();
    
            return makeJson(200, "Success add new offer",[$o]);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(),[$o]);
        }
    }
}
