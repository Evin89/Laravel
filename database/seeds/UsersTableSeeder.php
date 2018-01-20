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
            'password' => bcrypt('passwordEvin'),
            'is_admin' => true,
            'is_author' => true,
        ]);

        DB::table('users')->insert([
            'name' => ('Jeroen'),
            'email' => 'jeroen@test.com',
            'password' => bcrypt('passwordJeroen'),
            'is_admin' => false,
            'is_author' => true,
        ]);

        DB::table('users')->insert([
            'name' => ('Patrick'),
            'email' => 'patrick@test.com',
            'password' => bcrypt('passwordPatrick'),
            'is_admin' => false,
            'is_author' => false,
        ]);
    }
}
