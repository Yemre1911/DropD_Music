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
        Schema::table('tshirts', function (Blueprint $table) {
            // `base_price` sütununu decimal türüne değiştiriyoruz
            $table->decimal('base_price', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tshirts', function (Blueprint $table) {
            // Eğer migration geri alınırsa `base_price` sütununu integer türüne döndürüyoruz
            $table->integer('base_price')->change();
        });
    }
};
