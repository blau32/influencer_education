<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([GradesTableSeeder::class,]);
        $this->call([UsersTableSeeder::class,]);
        $this->call([CurriculumsTableSeeder::class,]);
        $this->call([CurriculumProgressTableSeeder::class,]);
        $this->call([ArticlesTableSeeder::class,]);
    }
}
