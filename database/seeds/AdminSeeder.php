<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@admin', 'email_verified_at' => now(), 'password' => '$2a$12$5MaeYkyR0Ugcazwna7pX9eLqfGJGbOSsnbe1QkjsBMGoCu6ElQ0Pm', 'remember_token' => null, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null, 'level' => 0, 'avatar' => '/img/non_user_default.svg'],
        ]);
    }
}
