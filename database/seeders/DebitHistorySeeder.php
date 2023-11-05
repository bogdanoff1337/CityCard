<?php

namespace Database\Seeders;

use App\Models\DebitHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebitHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DebitHistory::factory(50)->create();
    }
}
