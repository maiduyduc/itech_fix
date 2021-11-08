<?php

use App\Role;
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
        factory(\App\courses::class, 50)->create();
        factory(\App\User::class, 5)->create();
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            AdminSeeder::class,
        ]);
        
    }
}
