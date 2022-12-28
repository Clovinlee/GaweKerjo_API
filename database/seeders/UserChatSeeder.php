<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u=new user_chat;
        $u->user_id=2;
        $u->chat_id=1;
        $u->message="Chris kamu gk lulus FAI ya!";
        $u->save();

    }
}
