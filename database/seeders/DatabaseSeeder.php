<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->createAdmin();
    }

    private function createAdmin()
    {
        $seed = random_bytes(32);
        $seed = bin2hex($seed);

        $user = new User();
        $user->seed = $seed;
        $user->card_number = '616';
        $user->phone = '+380000000000';
        $user->login = 'admin';
        $user->password = 'secret';
        $user->role = 'admin';

        $user->save();
    }
}
