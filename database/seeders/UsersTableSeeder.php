<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin
        DB::table('users')->insert([
            [
            'name'=> 'Rahmat Admin',
            'username'=> 'rahmat',
            'email'=> 'rullah0202@gmail.com',
            'password'=> Hash::make('123123123'),
            'role'=> 'admin',
            'status'=> 'active',
            ],
            [
                'name'=> 'Humayun Admin',
                'username'=> 'humayun',
                'email'=> 'humayunelectro4@gmail.com',
                'password'=> Hash::make('123123123'),
                'role'=> 'admin',
                'status'=> 'active',
            ],
        //Vendor
            [
                'name'=> 'Rahmat Vendor',
                'username'=> 'rahmat',
                'email'=> 'rtnodesk@gmail.com',
                'password'=> Hash::make('123123123'),
                'role'=> 'vendor',
                'status'=> 'active',
            ],
        //User
            [
                'name'=> 'Rahmat User',
                'username'=> 'rahmat',
                'email'=> 'rtncombined@gmail.com',
                'password'=> Hash::make('123123123'),
                'role'=> 'user',
                'status'=> 'active',
            ],
        ]);
    }
}
