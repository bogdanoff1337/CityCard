<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Генеруємо масив з 30 містами
        $cities = [];
        for ($i = 1; $i <= 30; $i++) {
            $cities[] = ['name' => 'City ' . $i];
        }

        // Вставляємо дані до таблиці
        DB::table('cities')->insert($cities);
    }
}
