<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactInformation>
 */
class ContactInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
            'company_name' => fake()->unique()->company(),
            'address' => fake()->address(),
            'address2' => fake()->address(),
            'zip' => fake()->postcode(),
            'city' => fake()->city(),
            'state' => '',
            'country' => fake()->country(),
            'phone' => fake()->phoneNumber()
        ];
    }

    public function withOrder(Order $order): Factory 
    {
        return $this->state(function (array $attributes) use ($order) {
            return [
                'object_id' => $order->id,
                'object_type' => function (array $attributes) {
                    return Order::find($attributes['object_id'])->getMorphClass();
                }
            ];
        });
    }
}
