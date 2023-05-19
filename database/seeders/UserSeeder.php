<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'phone_number' => 9856411545
            ],
            [
                'name' => 'Sara',
                'email' => 'sara@gmail.com',
                'password' => Hash::make('1saraUser!'),
                'is_admin' => false,
                'phone_number' => 9856422545
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
