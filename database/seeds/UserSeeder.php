<?php

use App\User;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'name' => 'wendell suazo',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'name' => 'wendell2 suazo',
            'email' => 'admin2@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'name' => 'wendell3 suazo',
            'email' => 'admin3@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}
