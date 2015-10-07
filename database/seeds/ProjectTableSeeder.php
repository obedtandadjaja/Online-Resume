<?php

use App\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
class ProjectTableSeeder extends Seeder {
 
   public function run()
    {
        DB::table('projects')->delete();

        $faker = Faker\Factory::create('en_GB');

        for ($i = 0; $i < 10; $i++)
        {
            $name = $faker->sentence;
            $time_period = $faker->year($max = 'now');
            $occupation = $faker->word;
            $team_members = $faker->sentence;
            $description = $faker->paragraph($nbSentences = 8);

            Project::create([
                "name" => $name,
                "time_period" => $time_period,
                "occupation" => $occupation,
                "team_members" => $team_members,
                "description" => $description,
            ]);
        }
    }
 
}