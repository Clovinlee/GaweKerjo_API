<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        try {
            //code...

            $startdatetemp = Carbon::createFromFormat('Y-m-d',$r->date_start);
            // $startdate = getdate($startdatetemp);

            // $enddatetemp = strtotime($r->date_end);
            $enddatetemp = Carbon::createFromFormat('Y-m-d',$r->date_end);
            // $endtdate = getdate($enddatetemp);


            $edu = new Education();
            $edu->user_id = $r->user_id;
            $edu->name = $r->name;
            $edu->date_start = $startdatetemp;
            $edu->date_end = $enddatetemp;
            $edu->score = $r->score;
            $edu->save();
            return makeJson(200, "Success add education",[$edu]);
        } catch (\Throwable $th) {
            //throw $th;
            return makeJson(400, $th->getMessage(), null);
        }

    }
}
