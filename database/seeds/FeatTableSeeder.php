<?php

use App\Feat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
class FeatTableSeeder extends Seeder {
 
   public function run()
    {
        DB::table('feats')->delete();

        $faker = Faker\Factory::create('en_GB');

        for ($i = 0; $i < 10; $i++)
        {
            $name = $faker->company;
            $time_period = $faker->year($max = 'now');
            $occupation = $faker->word;
            $issuer = $faker->word;
            $description = $faker->paragraph($nbSentences = 8);

            Feat::create([
                "name" => $name,
                "time_period" => $time_period,
                "occupation" => $occupation,
                "issuer" => $issuer,
                "description" => $description,
            ]);
        }
    }
 
}