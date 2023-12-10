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
        $this->call(UserSeeder::class);
        $this->call(PetSeeder::class);
        $this->call(AdoptionSeeder::class);
        $this->call(WishlistSeeder::class);
        $this->call(ConversationSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(NotificationSeeder::class);
    }
}
