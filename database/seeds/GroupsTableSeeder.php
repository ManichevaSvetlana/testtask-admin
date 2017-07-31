<?php

use Illuminate\Database\Seeder;
require_once '/Faker/src/autoload.php';

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 30; $i++) {

            DB::table('groups')->insert([
                'name' => $faker->sentence(2,true)
            ]);
        };
    }
}
