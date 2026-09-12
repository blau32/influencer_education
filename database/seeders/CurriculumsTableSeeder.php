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
                'thumbnail' => 'null',
                'description' => 'これはテストです',
                'video_url' => 'null',
                'alway_delivery_flg' => 0,
                'grade_id' => '1',
            ],
        ]);
    }
}
