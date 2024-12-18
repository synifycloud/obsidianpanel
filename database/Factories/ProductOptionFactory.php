<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Pterodactyl\Models\ProductOption;

class ProductOptionFactory extends Factory
{
    protected $model = ProductOption::class;

    public function definition(): array
    {
        return [
            'product_id' => 1, // Adjust for seeding or testing
            'memory' => $this->faker->numberBetween(512, 16384),
            'cpu_limit' => $this->faker->numberBetween(10, 200),
            'allocation_limit' => $this->faker->numberBetween(1, 10),
            'database_limit' => $this->faker->numberBetween(1, 10),
            'backup_limit' => $this->faker->numberBetween(1, 10),
            'storage' => $this->faker->numberBetween(1024, 102400),
            'egg_id' => $this->faker->numberBetween(1, 50),
            'price' => $this->faker->numberBetween(1, 100000),
        ];
    }
}
