<?php

namespace Database\Factories;

use App\Models\DebitHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class DebitHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DebitHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_id' => \App\Models\Card::inRandomOrder()->first()->id,
            'type' => 'списування',
            'price' => \App\Models\Transport::inRandomOrder()->first()->price,
            'created_at' => $this->faker->dateTimeThisMonth,
        ];
    }
}
