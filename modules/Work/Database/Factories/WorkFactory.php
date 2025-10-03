<?php

namespace Modules\Work\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Work\Enums\Status;
use Modules\Work\Models\Work;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Work\Models\Work>
 */
class WorkFactory extends Factory
{
    protected $model = Work::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
    public function fakeState(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'customer_name' => $this->faker->name(),
                'customer_phone_number' => $this->faker->phoneNumber(),
                'starting_address' => $this->faker->address(),
                'customer_address' => $this->faker->address(),
                'status' => Status::UnAssigned,
            ];
        });
    }

}
