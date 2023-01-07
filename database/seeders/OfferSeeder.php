<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("offers")->insert([
            'user_id'=>5,
            "title"=>"IT Engineer Full Stack Developer",
            "Body"=>"Perusahaan kami sedang mencari full stack developer dengan kriteria skill yang telah dilampirkan, silahkan hubungi apabila anda merasa tertarik dengan tawaran kami. Gaji UMR, Bersedia bekerja di dalam tekanan, Dapat kerja 20 jam per hari."
        ]);
    }
}
