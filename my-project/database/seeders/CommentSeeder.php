<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('comments')->insert([
            'article_id' => 1,
            'author_id' => 1,
            'content' => 'This is very useful article. I\'m excited!!!',
            'created_at' => now()
        ]);
        DB::table('comments')->insert([
            'article_id' => 1,
            'author_id' => 2,
            'content' => 'SOLID sucks, functional programming rocks',
            'created_at' => now()
        ]);
    }
}
