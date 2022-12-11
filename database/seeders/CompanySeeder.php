<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("companies")->insert([
            "name"=>"ISTTS",
            "email"=>"istts@gmail.com",
            "description"=>"Sekolah tinggi",
            "notelp"=>"08123213123",
            "password"=>"istts",
        ]);
    }
}
