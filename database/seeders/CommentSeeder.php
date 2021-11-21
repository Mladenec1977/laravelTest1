<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'comment' => 'Comment1',
                'post_id' => 1,
                'user_id' => 1            
            ],
            [            
                'comment' => 'Comment2',
                'post_id' => 1,
                'user_id' => 2
            ],
            [            
                'comment' => 'Comment3',
                'post_id' => 2,
                'user_id' => 1
            ],
            [            
                'comment' => 'Comment4',
                'post_id' => 1,
                'user_id' => 2
            ]
        ];

        DB::table('comments')->insert($comments);
    }
}
