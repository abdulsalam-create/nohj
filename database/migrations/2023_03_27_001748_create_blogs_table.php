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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('title')->nullable();
            $table->string('b_img')->nullable();
            $table->text('b_desc')->nullable();
            $table->string('b_title1')->nullable();
            $table->text('b_desc1')->nullable();
            $table->string('f_img')->nullable();
            $table->string('f_img2')->nullable();
            // $table->string('b_title2')->nullable();
            // $table->text('blog_desc2')->nullable();
            // $table->string('blog_img2')->nullable();
            // $table->string('blog_img2_b')->nullable();
            $table->string('b_conc')->nullable();
            $table->text('b_conc_d')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
