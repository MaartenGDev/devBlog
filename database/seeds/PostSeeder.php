<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'type' => 0,
            'slug' => 'example-slug',
            'title' => 'Hello world',
            'content' => 'This is the **first** post made with the *Laravel CMS*',
            'user_id' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
