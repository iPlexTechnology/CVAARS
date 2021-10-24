<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GNDseeder::class,
            MOHseeder::class,
            DBseeder::class, //only for dev
            RoleSeeder::class,
            UserSeeder::class,
            VaccineSeeder::class,
        ]);
    }
}
