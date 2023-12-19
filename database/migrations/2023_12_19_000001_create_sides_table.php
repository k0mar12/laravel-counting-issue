<?php

/**
* Hope - This is what you need in programming
*
* （‐＾▽＾‐）
*
* @author  Vlad Poshvaniuk <vladlovedance@gmail.com>
* @date    2023-12-19
* @time    09:49
*/

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
        Schema::create('sides', function (Blueprint $table): void {
            $table->id();
            $table->unsignedSmallInteger('type');
            $table->foreignId('round_id')->references('id')->on('rounds')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sides');
    }
};
