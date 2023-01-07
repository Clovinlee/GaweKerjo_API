<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function getEducations(Request $r){
        $id = $r->id;
        $user_id = $r->user_id;
        $educations = Education::all();
        if($id != null){
            $educations = $educations->where("id",$id);
        }
        if($user_id != null){
            $educations = $educations->where("user_id",$user_id);
        }
        $educations = $educations->values();
        return makeJson(200, "Success get educations",$educations);
    }

    public function addEducation(Request $r){
        $edu = new Education();
        $edu->user_id = $r->user_id;
        $edu->name = $r->name;
        $edu->date_start = $r->date_start;
        $edu->date_end = $r->date_end;
        $edu->score = $r->score;
        $edu->save();
        return makeJson(200, "Success add education",[$edu]);
    }
}
