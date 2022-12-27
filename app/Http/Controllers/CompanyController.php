<?php

namespace App\Http\Controllers;

use App\Http\Controllers\jsonHelper as ControllersJsonHelper;
use App\Http\Helpers\jsonHelper;
use App\Models\Comment;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function register(Request $r){
        $name = $r->name;
        $email = $r->email;
        $notelp = $r->notelp;
        $password = $r->password;

        $cmp = new Company();
        $cmp->name = $name;
        $cmp->email = $email;
        $cmp->notelp = $notelp;
        $cmp->password = $password;

        $json = [];

        try {
            $cmp->save();

            $json = makeJson(200, "Register Successful", [$cmp]);
        } catch (\Throwable $th) {
            $json = makeJson(400, "Register Failed", null);
        }

        return $json;
    }

    public function getCompany(Request $r){
        try {
            $id = $r->id;
            $email = $r->email;
            $password = $r->password;
            $cmp = Company::all();
            if($id != null){
                $cmp = $cmp->where("id",$id);
            }
            if($email != null){
                $cmp = $cmp->where("email",$email);
            }
            if($password != null){
                $cmp = $cmp->where("password",$password);
            }
            $cmp = $cmp->values();

            return makeJson(200, "Company found",$cmp);
        } catch (\Throwable $th) {
            return makeJson(400, $th->getMessage(), null);
        }
        
    }

    public function searchCompany(Request $r){
        $name = $r->name;
        $cmp = Company::where("name","like","%".$name."%");
        return $cmp;
    }
    
    // function makeJson(int $status, string $message, $data){
    //     $json = [
    //         "code"=>$status,
    //         "message"=> $message,
    //         "data" => $data,
    //     ];

    //     return $json;
    // }
}
