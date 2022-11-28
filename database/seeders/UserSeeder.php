<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => "Chrisanto Sinatra",
            'email' => "c@gmail.com",
            'description' => "Aku orang yang suka tidur tapi ingin kaya",
            'gender' => "L",
            'notelp' => "0812323123",
            'birthdate' => date("Y-m-d", strtotime("2001-04-11")),
            // 'password' => Hash::make('c'),
            'password' => "c",
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => "Benyamin Limanto",
            'email' => "b@gmail.com",
            'description' => "Aku sangat menyukai Koding",
            'gender' => "P",
            'notelp' => "9128391283",
            'birthdate' => date("Y-m-d", strtotime("1995-12-20")),
            // 'password' => Hash::make('b'),
            'password' => "b",
            'created_at' => Carbon::now(),
        ]);
    }
}
