<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->foreignId('create_user_id')->nullable()->constrained('users');
            $table->foreignId('update_user_id')->nullable()->constrained('users');
            $table->timestamps(); //هذه الداله خاصه بالوقت والتريخ 
            $table -> softDeletes();// deleted_at تقوم بإضافة عمود خاص إلى الجدول في قاعدة في  يسمى 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
