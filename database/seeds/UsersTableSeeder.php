<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            DB::table('users')->insert([
                'username' => $faker->userName,
                'password' => $faker->password(7, 15),
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'dbo' => $faker->date('Y-m-d', 'now'),

            ]);
        };
    }
}
