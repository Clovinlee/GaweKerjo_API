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
            "Body"=>"Perusahaan kami sedang mencari full stack developer dengan kriteria skill yang telah dilampirkan, silahkan hubungi apabila anda merasa tertarik dengan tawaran kami. Gaji UMR, Bersedia bekerja di dalam tekanan, Dapat kerja 20 jam per hari.",
            "skills"=>"HTML, CSS, API, LARAVEL"
        ]);
        DB::table("offers")->insert([
            'user_id'=>5,
            "title"=>"Copy Writter",
            "Body"=>"Perusahaan kami sedang mencari seorang copy writter. Pekerjaan ini bersifat part time, dapat di ikuti oleh mahasiswa jurusan apapun minimal semester 3. Gaji UMK dan bersifat WFH",
            "skills"=>"Copy writter, Fluent in English"
        ]);
        DB::table("offers")->insert([
            'user_id'=>5,
            "title"=>"Customer Service",
            "Body"=>"Perusahaan kami sedang mencari customer service untuk bekerja secara full time di kantor kami yang berada di Surabaya. Di utamakan adalah seorang fresh graduate dengan pengalaman minimal 1 tahun di bidangnya.",
            "skills"=>"Empathy, good communication, and problem-solving"
        ]);
        DB::table("offers")->insert([
            'user_id'=>4,
            "title"=>"Digital Marketing",
            "Body"=>"Perusahaan kami sedang mencari staff Digital Marketing untuk bekerja secara full time 8 jam per hari di perusahaan kami. Di utamakan adalah seorang dengan pengalaman minimal 3 tahun dibidangnya.",
            "skills"=>"Copywriting, Social media marketing, Search engine optimization (SEO), Project management"
        ]);
        DB::table("offers")->insert([
            'user_id'=>4,
            "title"=>"Research Assistant",
            "Body"=>"Perusahaan kami sedang mencari research assistant untuk bekerja secara part time di perusahaan kami dengan total waktu kerja 6 jam per hari. Di utamakan adalah seorang mahasiswa dengan jurusan Informatika, Sistem Informasi",
            "skills"=>"Analisa data, Mengerti tentang database dan dataset"
        ]);
    }
}
