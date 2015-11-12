<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
class UserTableSeeder extends Seeder {
 
   public function run()
    {
        DB::table('users')->delete();

        $faker = Faker\Factory::create('en_GB');

        $user = array(
            'id' => 1,
        	'name' => 'Obed Tandadjaja',
        	'password' => Hash::make('5594737555'),
        	'email' => 'obed.tandadjaja@gmail.com',
            'summary' => $faker->paragraph($nbSentences = 20),
        	);

		DB::table('users')->insert($user);
    }
 
}