<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Immunotherapy Drugs', 'Cardiovascular Drugs', 'Oncology Drugs']),
            'description' => $this->faker->randomElement([
                'Drugs that manipulate the immune system to treat diseases, including autoimmune diseases and cancers.',
                'Medications used to treat conditions of the heart and blood vessels.',
                'Medications used in the treatment of cancer.'
            ]),
            'parent_id' => null,
        ];
    }
}

