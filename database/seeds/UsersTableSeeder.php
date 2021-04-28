<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$VTgoCQCs2MZV3MG.jjqJU./TMw6jPCzmT6EL3aApocRl.5w5tN7Sq',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}