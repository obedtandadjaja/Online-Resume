<?php

use App\Professional;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
class ProfessionalTableSeeder extends Seeder {
 
   public function run()
    {
        DB::table('professionals')->delete();

        $faker = Faker\Factory::create('en_GB');

        for ($i = 0; $i < 10; $i++)
        {
            $name = $faker->company;
            $time_period = $faker->year($max = 'now');
            $location = $faker->city;
            $position_title = $faker->word;
            $description = $faker->paragraph($nbSentences = 8);

            Professional::create([
                "name" => $name,
                "time_period" => $time_period,
                "location" => $location,
                "position_title" => $position_title,
                "description" => $description,
            ]);
        }
    }
 
}