<?php

namespace App\Http\Controllers;

use App\Models\organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //
    public function addOrganization(Request $r){
        $o = new organization();
        $o->user_id = $r->user_id;
        $o->name = $r->name;
        $o->description = $r->description;
        $o->date_start = $r->date_start;
        $o->date_end = $r->date_end;
        $o->save();

        return $o;
    }

    public function getOrganizations(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;

        $o = organization::all();
        if($id != null){
            $o = $o->where("id",$id);
        }
        if($user_id != null){
            $o = $o->where("user_id",$user_id);
        }
        $o = $o->values();

        return $o;
    }
}
