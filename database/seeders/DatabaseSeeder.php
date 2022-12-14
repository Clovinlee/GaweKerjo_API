<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        date_default_timezone_set('Asia/Jakarta');

        $this->call([UserSeeder::class, SkillSeeder::class, PostSeeder::class, LanguageSeeder::class,ChatSeeder::class,UserChatSeeder::class,FollowsSeeder::class,OfferSeeder::class]);
    }
}
