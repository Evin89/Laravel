<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Halflings'
        ]);

        DB::table('types')->insert([
            'name' => 'Chaos Marauders'
        ]);

        DB::table('types')->insert([
            'name' => 'Dark Elfs'
        ]);
    }
}
