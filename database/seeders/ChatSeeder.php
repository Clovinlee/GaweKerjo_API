<?php

namespace Database\Seeders;

use App\Models\chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c=new chat();
        $c->user_id=2;
        $c->recipient_id=1;
        $c->save();

        $c=new chat();
        $c->user_id=1;
        $c->recipient_id=3;
        $c->save();
    }
}
