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
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('category_id');

            $table->timestamps();
            //IDX
            $table->index('post_id', 'post_category_post_idx');
            $table->index('category_id', 'post_category_category_idx');
            //FK
            $table->foreign('post_id', 'post_category_post_fk')->on('posts')->references('id');
            $table->foreign('category_id', 'post_category_category_fk')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_categories');
    }
};
