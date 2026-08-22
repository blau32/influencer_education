<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            // どのユーザーの時間割か
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // 曜日 ('月', '火', '水', '木', '金')
            $table->string('day_of_week');
            // 時限 (1, 2, 3, 4, 5 など)
            $table->unsignedTinyInteger('period');
            // 科目名 ('国語', '数学' など)
            $table->string('subject_name');
            $table->timestamps();

            // ユーザー×曜日×時限 の重複防止
            $table->unique(['user_id', 'day_of_week', 'period']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};