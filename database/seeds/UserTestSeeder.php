<?php

use Illuminate\Database\Seeder;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Fathil Arham',
            'email' => 'fathil.arham@gmail.com',
            'password' => Hash::make('123123'),
        ]);
    }
}
