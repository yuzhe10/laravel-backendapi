<?php

use App\Dao\User\Role;
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
        $admin = User::where('name', 'admin')->first();
        if ($admin == null) {
            $admin = User::create([
                'name' => 'admin',
                'phone' => '18612307258',
                'phone_verified_at' => now(),
//            'email' => $faker->unique()->safeEmail,
                'email' => 'admin@yuzhe.wang',
                'email_verified_at' => now(),
                'password' => Hash::make('1234'),
                'api_token' => User::generateApiToken(),
                'remember_token' => Str::random(10),
            ]);
        }
        $role = Role::findOrCreate('Super Admin');
        if (!$admin->hasRole($role)) {
            $admin->assignRole($role);
        }
    }
}
