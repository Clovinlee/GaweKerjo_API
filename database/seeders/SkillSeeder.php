<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $listSkill = ["HTML", "CSS", "Javascript", "PHP", "Problem Solving", "Critical Thinking", "Software Engineering", "Cloud", "Linux", "Marketing", "Public Speaking", "Copy Writing", "Python", "Java", "Golang", "Flutter", "Kotlin"];

        foreach ($listSkill as $key => $k) {
            DB::table('skills')->insert([
                "name"=>$k,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
