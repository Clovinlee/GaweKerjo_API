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
            'type'=>1,
            'birthdate' => date("Y-m-d", strtotime("2001-04-11")),
            'image'=>"/storage/user/1.png",
            // 'password' => Hash::make('c'),
            'password' => "c",
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => "Benyamin Limanto",
            'email' => "b@gmail.com",
            'description' => "Aku sangat menyukai Koding",
            'gender' => "P",
            'type'=>1,
            'notelp' => "9128391283",
            'birthdate' => date("Y-m-d", strtotime("1995-12-20")),
            // 'password' => Hash::make('b'),
            'password' => "b",
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => "Markobar",
            'email' => "m@gmail.com",
            'description' => "Aku bukan perusahaan buatan kesang",
            'gender' => "L",
            'type'=>1,
            'notelp' => "9128391233",
            'birthdate' => date("Y-m-d", strtotime("1890-12-20")),
            // 'password' => Hash::make('b'),
            'password' => "m",
            'created_at' => Carbon::now(),
        ]);

        DB::table("users")->insert([
            "name"=>"ISTTS",
            "email"=>"istts@gmail.com",
            'type'=>0,
            "description"=>"Sekolah tinggi",
            "notelp"=>"08123213123",
            "lokasi"=>"Indonesia, Surabaya",
            "password"=>"istts",
            "created_at"=>Carbon::now()
        ]);

        DB::table("users")->insert([
            "name"=>"Microsoft",
            "email"=>"microsoft@com",
            'type'=>0,
            "description"=>"Windows is my windows",
            "lokasi"=>"USA, New York",
            "notelp"=>"01234",
            "password"=>"microsoft",
            "created_at"=>Carbon::now()
        ]);

        DB::table("users")->insert([
            "name"=>"Apple",
            "email"=>"apple@com",
            'type'=>0,
            "description"=>"Apple is tech corporation",
            "lokasi"=>"Britain, UK",
            "notelp"=>"12111",
            "password"=>"apple",
            "created_at"=>Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => "Dimas Bambang",
            'email' => "d@gmail.com",
            'description' => "Aku suka sepak bola , ngoding, makan, internet, tidur",
            'gender' => "L",
            'type'=>1,
            'notelp' => "12315121",
            'birthdate' => date("Y-m-d", strtotime("1980-11-15")),
            // 'password' => Hash::make('b'),
            'password' => "d",
            'created_at' => Carbon::now(),
        ]);
    }
}
