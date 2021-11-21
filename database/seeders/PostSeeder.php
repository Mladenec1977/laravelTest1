<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
            'title' => 'Post text 1',
            'text' => 'Of course',
            'user_id' => 1            
            ],
            [            
            'title' => 'Post text 2',
            'text' => 'rrrrr Of course',
            'user_id' => 2
            ]
        ];

        DB::table('posts')->insert($posts);        
    }
}
