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
    Schema::create('paese_viaggio', function (Blueprint $table) {
        $table->foreignId('paese_id')
              ->constrained('paesi')
              ->cascadeOnDelete();

        $table->foreignId('viaggio_id')
              ->constrained('viaggi')
              ->cascadeOnDelete();

        $table->primary(['paese_id', 'viaggio_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paese_viaggio');
    }
};
