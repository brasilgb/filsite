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
            $table->foreignId('category_id')->nullable()->references('id')->on('categories');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('thumbnail')->nullable();
            $table->string('featured')->nullable();
            $table->integer('type')->nullable();
            $table->integer('active');
            $table->integer('menu');
            $table->integer('visiblehome');
            $table->timestamps();
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
