<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                        DB::table('articles')->insert([
        [
            'title' => 'test',
            'article_contents' => 'this is a test article',
            'posted_date' => '2026-01-01 00:00:00',
            ],
        ]);
    }
}