<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AddDefaultRoleToUserSeeder::class);
        $this->call(PostSeeder::class);
    }
}
