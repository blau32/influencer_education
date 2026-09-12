<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'name_kana' => 'テスト',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'profile_image' => '\profile\プロフィール設定.png',
                'grade_id' => '1',
            ],
        ]);
    }
}
