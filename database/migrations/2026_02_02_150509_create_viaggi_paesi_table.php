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
        Schema::create('viaggi_paesi', function (Blueprint $table) {
            $table->foreignId('paese_id')->constrained('paesis');
            $table->foreignId('viaggio_id')->constrained('viaggis');
            $table->primary(['paese_id', 'viaggio_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viaggi_paesi');
    }
};
