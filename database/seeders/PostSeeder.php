<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            "user_id" => 1,
            "title" => "C# Development",
            'body'=>"HELPP!!, Butuh bantuan untuk mendevelop project berbasiskan C#",
            'like_count' => 0,
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            "user_id" => 2,
            "title" => "Achievement Dicoding",
            'body'=>"Saya telah berhasil menyelesaikan course machine learning dicoding dengan sempurna!",
            'like_count' => 0,
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            "user_id" => 1,
            "title" => "Achievement Coursera",
            'body'=>"Saya telah berhasil menyelesaikan course machine learning dan data science coursera dengan sempurna!",
            'like_count' => 0,
            'created_at' => Carbon::now(),
        ]);
    }
}
