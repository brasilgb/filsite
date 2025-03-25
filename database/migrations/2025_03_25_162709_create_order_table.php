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
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique()->index();
            $table->string('client_id')->nullable();
            $table->string('details')->nullable();
            $table->string('defect')->nullable();
            $table->string('descbudget')->nullable();
            $table->decimal('valuebudget', 10, 2)->default(0);
            $table->decimal('cost', 10, 2)->default(0);
            $table->decimal('valueservice', 10, 2)->default(0);
            $table->decimal('valueparts', 10, 2)->default(0);
            $table->string('status')->nullable();
            $table->dateTime('dtentry')->nullable();
            $table->dateTime('dtdelivery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
