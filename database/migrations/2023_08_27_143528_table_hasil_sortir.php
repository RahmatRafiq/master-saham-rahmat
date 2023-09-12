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
        Schema::create('table_hasil_sortir', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->decimal('open', 10, 2);
            $table->decimal('high', 10, 2);
            $table->decimal('low', 10, 2);
            $table->decimal('close', 10, 2);
            $table->decimal('y_open', 10, 2);
            $table->decimal('y_high', 10, 2);
            $table->decimal('y_low', 10, 2);
            $table->decimal('y_close', 10, 2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_hasil_sortir');
    }
};
