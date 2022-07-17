<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => 'Arpit Gupta',
                "email" => '68arpit@gmail.com',
                "password" => bcrypt("123456"),
                "birthdate" => "2022-06-12"
            ],
            [
                "name" => "Vimal Kapoor",
                "email" => "vimal@gmail.com",
                "password" => bcrypt("123456"),
                "birthdate" => "2000-06-23"
            ],
            [
                "name" => "Ashish Kumar",
                "email" => "ashish@gmail.com",
                "password" => bcrypt("123456"),
                "birthdate" => "2000-07-23"
            ]
            ];
        
        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
