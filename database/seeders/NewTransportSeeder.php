<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewTransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       // Масив з даними для вставки
       $transports = [
        ['name' => 'Автобус', 'price' => 25],
        ['name' => 'Тролейбус', 'price' => 15],
        ['name' => 'Поїзд', 'price' => 50],
        // Додайте більше записів, якщо потрібно
    ];

    // Вставляємо дані до таблиці
    DB::table('transports')->insert($transports);
    }
}
