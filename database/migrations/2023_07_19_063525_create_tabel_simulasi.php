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
        Schema::create('tabel_simulasi', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->decimal('y_open', 10, 2);
            $table->decimal('y_high', 10, 2);
            $table->decimal('y_low', 10, 2);
            $table->decimal('y_close', 10, 2);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_simulasi');
    }
};
