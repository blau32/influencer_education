<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CurriculumProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculum_progress')->insert([
            [
                'curriculums_id' => '1',
                'users_id' => '1',
                'clear_flg' => 0,
            ],
        ]);
    }
}
