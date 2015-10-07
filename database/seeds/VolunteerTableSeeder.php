<?php

use App\Volunteer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
class VolunteerTableSeeder extends Seeder {
 
   public function run()
    {
        DB::table('volunteers')->delete();

        $faker = Faker\Factory::create('en_GB');

        for ($i = 0; $i < 10; $i++)
        {
            $name = $faker->company;
            $time_period = $faker->year($max = 'now');
            $role = $faker->word;
            $cause = $faker->word;
            $description = $faker->paragraph($nbSentences = 8);

            Volunteer::create([
                "name" => $name,
                "time_period" => $time_period,
                "role" => $role,
                "cause" => $cause,
                "description" => $description,
            ]);
        }
    }
 
}