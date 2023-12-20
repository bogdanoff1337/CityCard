<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


       // Масив з даними для вставки
       $types = [
           ['name' => 'Студенський'],
           ['name' => 'Пенсійний'],
           ['name' => 'Шкільний'],
       ];

       // Вставляємо дані до таблиці
       DB::table('types')->insert($types);
    }
}
