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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('uri');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->text('content');
            $table->string('lang');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
            $table->index('categoty_id', 'post_category_idx');
            $table->foreign('categoty_id', 'post_category_fk')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
