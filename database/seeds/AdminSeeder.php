<?php

use App\Dao\User\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AdminSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        if (User::where('name', 'admin')->first() != null) {
            return;
        }
        User::create([
            'name' => 'admin',
//            'email' => $faker->unique()->safeEmail,
            'email' => 'admin@yuzhe.wang',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'api_token' => Str::random(80),
            'remember_token' => Str::random(10),
        ]);
    }
}
