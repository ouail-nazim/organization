<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->name(),
            'lastName' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->e164PhoneNumber(),
            'subject' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'message' => $this->faker->text($maxNbChars = 200),
        ];
    }
}
