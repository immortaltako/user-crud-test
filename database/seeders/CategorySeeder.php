<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $immunotherapy = Category::create([
            'name' => 'Immunotherapy Drugs',
            'description' => 'Drugs that manipulate the immune system to treat diseases, including autoimmune diseases and cancers.'
        ]);

        $cardiovascular = Category::create([
            'name' => 'Cardiovascular Drugs',
            'description' => 'Medications used to treat conditions of the heart and blood vessels.'
        ]);

        $oncology = Category::create([
            'name' => 'Oncology Drugs',
            'description' => 'Medications used in the treatment of cancer.'
        ]);
    }
}
