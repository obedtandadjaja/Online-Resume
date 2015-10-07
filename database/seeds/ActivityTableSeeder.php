<?php

use App\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
class ActivityTableSeeder extends Seeder {
 
   public function run()
    {
        DB::table('activities')->delete();

        $faker = Faker\Factory::create('en_GB');

        for ($i = 0; $i < 10; $i++)
        {
            $name = $faker->company;
            $time_period = $faker->year($max = 'now');
            $description = $faker->paragraph($nbSentences = 8);

            Activity::create([
                "name" => $name,
                "time_period" => $time_period,
                "description" => $description,
            ]);
        }
    }
 
}