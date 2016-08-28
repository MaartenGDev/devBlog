<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AddDefaultRoleToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
