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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // バナーのタイトル・識別名
            $table->string('image_path', 512); // 画像ファイルの保存パス
            $table->string('link_url', 512)->nullable(); // 遷移先URL（空欄を許容）
            $table->integer('sort_order')->default(0); // 表示順序
            $table->boolean('is_active')->default(true); // 表示・非表示フラグ
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
        Schema::dropIfExists('banners');
    }
};