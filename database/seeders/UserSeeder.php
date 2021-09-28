<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'email' => 'admin@cvaars.com',
            'role_id' => 1,
            'password' => Hash::make('admin@cvaars.com'),
        ]);
        User::create([
            'name' => 'Sampath Bandara',
            'email' => 'hm@cvaars.com',
            'role_id' => 2,
            'password' => Hash::make('hm@cvaars.com'),
        ]);
        User::create([
            'name' => 'Kasun Wikramasingha',
            'email' => 'doctor@cvaars.com',
            'role_id' => 3,
            'password' => Hash::make('doctor@cvaars.com'),
        ]);
        User::create([
            'name' => 'Saman Edirimuni',
            'email' => 'gsn@cvaars.com',
            'role_id' => 4,
            'password' => Hash::make('gsn@cvaars.com'),
        ]);
    }
}
