<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    //
    public function getExperience(Request $r){
        $e = Experience::all();
        if ($r->id!=null) {
            $e=$e->where("id",$r->id);
        }
        if ($r->user_id!=null) {
            $e=$e->where("user_id",$r->user_id);
        }
        return makeJson(200, "Sukses get Experience",$e->values());
    }

    public function addExperience(Request $r){
        $e=new Experience();
        $e->user_id=$r->user_id;
        $e->company_id=$r->company_id;
        $e->name=$r->name;
        $e->description=$r->description;
        $e->date_start=$r->date_start;
        $e->date_end=$r->date_end;
        $e->save();
        return makeJson(200,"Sukses add experience",[$e]);
    }
}
