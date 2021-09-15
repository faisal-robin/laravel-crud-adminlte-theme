<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
       DB::table('users')->insert([
            [
                'name' => 'Faisal Robin',
                'email' => 'faisalrobin22@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        
        ]);
    }
}