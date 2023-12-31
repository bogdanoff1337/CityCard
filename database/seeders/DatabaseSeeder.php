<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NewTransportSeeder::class,
            NewTypeSeeder::class,
            NewCitySeeder::class,
            DebitHistorySeeder::class,
            CreditHistorySeeder::class,
            NewAdminSeeder::class,
            // Додайте інші сідери, якщо вони є
        ]);

    }
}
