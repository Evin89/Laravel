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
        DB::table('users')->insert([
        'name' => ('Evin'),
        'email' => 'evin@test.com',
        'password' => 'password',
    ]);

        DB::table('users')->insert([
            'name' => ('Jeroen'),
            'email' => 'jeroen@test.com',
            'password' => 'password',
        ]);
    }
}
