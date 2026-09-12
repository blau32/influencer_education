<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculums')->insert([
            [
                'title' => '授業タイトル１',
                'thumbnail' => '#',
                'description' => 'これはテストです',
                'video_url' => '#',
                'alway_delivery_flg' => '0',
                'grade_id' => '0',
            ],
        ]);
    }
}
