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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('b_img')->nullable();
            $table->string('category')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->unsignedBigInteger('collection_id')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
