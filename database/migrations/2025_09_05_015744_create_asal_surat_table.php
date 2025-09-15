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
        Schema::create('asal_surat', function (Blueprint $table) {
            $table->id();
            $table->string('asal_tujuan_surat', 100);
            $table->integer('status')->default(1);
            $table->string('user_input', 50)->nullable();
            $table->timestamp('tanggal_input')->nullable();
            $table->string('user_update', 50)->nullable();
            $table->timestamp('tanggal_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asal_surat');
    }
};