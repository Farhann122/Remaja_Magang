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
        Schema::create('tahun', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun', 50)->nullable(); 
            $table->boolean('status')->nullable()->default(1); 
            $table->string('user_input', 100)->nullable(); 
            $table->dateTime('tanggal_input')->nullable(); 
            $table->string('user_update', 100)->nullable(); 
            $table->dateTime('tanggal_update')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun');
    }
};
