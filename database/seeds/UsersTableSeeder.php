<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Ayush Likhar',
        	'email' => 'alikhar@laxyo.org',
        	'password' => Hash::make('laxyo123'),
        	'acc_type' => 'A'
        ]);
    }
}
