<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->insert([
            [
                'articleId' => Str::uuid(),
                'dokterID' => 1,
                'title' => 'First Article',
                'content' => 'This is the content of the first article.',
                'publishDate' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articleId' => Str::uuid(),
                'dokterID' => 2,
                'title' => 'Second Article',
                'content' => 'This is the content of the second article.',
                'publishDate' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articleId' => Str::uuid(),
                'dokterID' => 3,
                'title' => 'Third Article',
                'content' => 'This is the content of the third article.',
                'publishDate' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}