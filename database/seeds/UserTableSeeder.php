<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Maarten',
            'email' => 'admin@example.com',
            'password' => bcrypt('d3vbl0g'),
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
