<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            // usersテーブルと紐付け（ユーザーが削除されたら時間割も連動して消える設定）
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // 曜日（0:日 〜 6:土）
            $table->tinyInteger('day_of_week');
            // 時限・コマ数（1限、2限など）
            $table->integer('period');
            // 科目名・予定名
            $table->string('subject_name');
            // 教室・場所（空欄を許容）
            $table->string('room')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
};