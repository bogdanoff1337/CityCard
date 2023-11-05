<?php

namespace Database\Factories;

use App\Models\CreditHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CreditHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CreditHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_id' => \App\Models\Card::inRandomOrder()->first()->id,
            'amount_in' => $this->faker->randomFloat(2, 10, 1000),
            'created_at' => $this->faker->dateTimeThisMonth,
        ];
    }
}

