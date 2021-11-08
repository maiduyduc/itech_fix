<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categories')->insert([
            ['name' => 'Lập trình', 'parent_id' => 0, 'slug' => 'lap-trinh', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'JavaScript', 'parent_id' => 1, 'slug' => 'javascript', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'PHP', 'parent_id' => 1, 'slug' => 'php', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'Python', 'parent_id' => 1, 'slug' => 'python', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'Tin học văn phòng', 'parent_id' => 0, 'slug' => 'tin-hoc-van-phong', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'Microsoft Word', 'parent_id' => 5, 'slug' => 'microsoft-word', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'Microsoft PowerPoint', 'parent_id' => 5, 'slug' => 'microsoft-powerpoint', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'Microsoft Excel', 'parent_id' => 5, 'slug' => 'microsoft-excel', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'SQL', 'parent_id' => 0, 'slug' => 'lap-trinh', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'Microsoft SQL Server', 'parent_id' => 9, 'slug' => 'microsoft-sql-server', 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
        ]);
    }
}
