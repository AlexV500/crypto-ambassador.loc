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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('label');
            $table->string('url');
            $table->string('class')->nullable();
            $table->integer('position')->default(0);
            $table->integer('published')->default(1);
            $table->unsignedBigInteger('menu_widget_id')->default(0);
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->integer('depth')->default(0);
            $table->integer('column_number')->default(0);
            $table->timestamps();

            $table->foreign('menu_widget_id')->references('id')
                ->on('menu_widget')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
