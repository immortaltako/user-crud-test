<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Faker\Factory::create('en_US');
        for ($i = 0; $i < 5; $i++) {
            $user = new User;
            
            $user->name = $faker->name;
            $user->email = $faker->unique()->safeEmail;
            $user->gender = substr(str_shuffle("mftn"), 0, 1); //male (m), female (f), third(t), not-disclosed (n)
            $user->email_verified_at = now();
            $user->password = $faker->password;
            $user->save();

        }
    }
}
