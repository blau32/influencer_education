<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('バナータイトル');
            $table->string('image_path')->comment('画像保存パス');
            $table->string('redirect_url', 2048)->comment('遷移先URL');
            $table->integer('sort_order')->default(1)->comment('表示順（1~999）');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};