<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "user_id"=>fake()->numberBetween(0,10),
            "title"=>fake()->sentence(),
            "tags"=>'Laravel, API, Backends',
            "company"=>fake()->company(),
            "location"=>fake()->city(),
            "email"=>fake()->companyEmail(),
            "website"=>fake()->url(),
            "description"=>fake()->paragraph(5),
            "created_at"=>fake()->dateTime()
        ];
    }
}
