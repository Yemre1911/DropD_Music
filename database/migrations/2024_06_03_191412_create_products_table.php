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
            $table->timestamps();
            $table->string('brand');
            $table->integer('price');
            $table->integer('sale')->nullable();
            $table->string('type');
            $table->string('model');
            $table->string('symmetry');
            $table->text('features'); // Changed to text for multiple features
            $table->string('product_code');
            $table->integer('stock');
            $table->string('main_image')->nullable(); // Changed to main_image
            $table->string('image1')->nullable(); // Renamed to image1 and made nullable
            $table->string('image2')->nullable(); // Renamed to image2 and made nullable
            $table->string('image3')->nullable(); // Renamed to image3 and made nullable
            $table->string('image4')->nullable(); // Renamed to image4 and made nullable
            $table->string('color');
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
