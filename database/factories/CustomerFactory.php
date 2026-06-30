<?php

namespace Database\Factories;

use App\Enums\CustomerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array { return ['institution_name' => fake()->company(), 'contact_name' => fake()->name(), 'email' => fake()->safeEmail(), 'domain' => fake()->domainName(), 'status' => CustomerStatus::Active]; }
}
