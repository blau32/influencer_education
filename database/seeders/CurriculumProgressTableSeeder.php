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
        $curriculumIds = DB::table('curriculums')->pluck('id');

        foreach ($curriculumIds as $curriculumId) {

            DB::table('curriculum_progress')->updateOrInsert(
                [
                    'curriculums_id' => $curriculumId,
                    'users_id' => 1,
                ],
                [
                    'clear_flg' => $curriculumId % 2,
                ]
            );
        }
    }
}
