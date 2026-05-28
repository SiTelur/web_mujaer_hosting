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
    Schema::create('ikans', function (Blueprint $table) {
        $table->id();
        $table->string('kelas');  // Untuk "Grade A"
        $table->string('ukuran'); // Untuk "18 - 20 cm"
        $table->string('berat');  // Untuk "1 Kg"
        $table->string('hasil');  // Untuk "10 Ikan"
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikans');
    }
};
