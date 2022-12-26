<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $list = ["Afrikaans",
        "Arabic",
        "Bengali",
        "Bulgarian",
        "Catalan",
        "Cantonese",
        "Croatian",
        "Czech",
        "Danish",
        "Dutch",
        "Lithuanian",
        "Malay",
        "Malayalam",
        "Panjabi",
        "Tamil",
        "English",
        "Finnish",
        "French",
        "German",
        "Greek",
        "Hebrew",
        "Hindi",
        "Hungarian",
        "Indonesian",
        "Italian",
        "Japanese",
        "Javanese",
        "Korean",
        "Norwegian",
        "Polish",
        "Portuguese",
        "Romanian",
        "Russian",
        "Serbian",
        "Slovak",
        "Slovene",
        "Spanish",
        "Swedish",
        "Telugu",
        "Thai",
        "Turkish",
        "Ukrainian",
        "Vietnamese",
        "Welsh",
        "Sign language",
        "Algerian",
        "Aramaic",
        "Armenian",
        "Berber",
        "Burmese",
        "Bosnian",
        "Brazilian",
        "Bulgarian",
        "Cypriot",
        "Corsica",
        "Creole",
        "Scottish",
        "Egyptian",
        "Esperanto",
        "Estonian",
        "Finn",
        "Flemish",
        "Georgian",
        "Hawaiian",
        "Indonesian",
        "Inuit",
        "Irish",
        "Icelandic",
        "Latin",
        "Mandarin",
        "Nepalese",
        "Sanskrit",
        "Tagalog",
        "Tahitian",
        "Tibetan",
        "Gypsy",
        "Wu"];

        foreach ($list as $l) {
            DB::table("languages")->insert([
                "name"=>$l,
                "created_at"=>Carbon::now()
            ]);    
        }
    }
}
