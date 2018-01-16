<?php

use Illuminate\Database\Seeder;

class WarbandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warbands')->insert([
            'user_id' => 1,
            'name' => 'Super Dark Elfs',
            'rating' => 1012,
            'type' => 'Dark Elfs',
        ]);

        DB::table('warbands')->insert([
            'user_id' => 1,
            'name' => 'Marauding Marauders',
            'rating' => 1089,
            'type' => 'Chaos Marauders',
        ]);

        DB::table('warbands')->insert([
            'user_id' => 2,
            'name' => 'Heldhaftige Halflins 2',
            'rating' => 998,
            'type' => 'Halflings',
        ]);

    }
}
