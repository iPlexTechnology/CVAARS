<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => '1',
            'role' => 'Admin',
        ]);
        Role::create([
            'id' => '2',
            'role' => 'Health Ministry Official',
        ]);
        Role::create([
            'id' => '3',
            'role' => 'Doctor',
        ]);
        Role::create([
            'id' => '4',
            'role' => 'Grama Niladhari',
        ]);
    }
}
