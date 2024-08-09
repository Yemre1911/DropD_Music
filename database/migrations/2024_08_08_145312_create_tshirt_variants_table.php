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
        Schema::create('tshirt_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tshirt_id')->constrained('tshirts')->onDelete('cascade');
            $table->string('size');
            $table->string('color');
            $table->decimal('additional_price', 10, 2)->nullable()->default(0.00);
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tshirt_variants');
    }
};
