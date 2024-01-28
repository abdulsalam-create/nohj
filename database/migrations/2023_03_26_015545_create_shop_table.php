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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_desc')->nullable();
            $table->string('b_img')->nullable();
            $table->string('s_img')->nullable();
            $table->string('s_img2')->nullable();
            $table->string('s_img3')->nullable();
            $table->string('s_img4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
