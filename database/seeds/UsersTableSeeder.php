<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Roles;
use App\RolesHas;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $lastId = User::create([
            	'name' => 'Ayush Likhar',
            	'email' => 'alikhar@laxyo.org',
            	'password' => Hash::make('laxyo123'),
            	'acc_type' => 'A'
            ])->id;
    Roles::create([ 'name' => 'superadmin',
                    'guard_name' => 'web'                                               
                  ]); 
    Roles::create([ 'name' => 'account',
                    'guard_name' => 'web'                                               
                  ]);
    Roles::create([ 'name' => 'fleets',
                    'guard_name' => 'web'                                               
                  ]);
        $user = array('role_id'=>$lastId,'model_id'=>1,'model_type'=>'App\User');
        RolesHas::insert($user);
    }
}
