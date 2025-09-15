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
        Schema::create('mak', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('kode_mak', 6)->nullable();
            $table->string('nama_mak', 100)->nullable();
            $table->text('keterangan_mak')->nullable();
            $table->text('contoh_mak')->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->string('user_input', 100)->nullable();
            $table->datetime('tanggal_input')->nullable();
            $table->string('user_update', 100)->nullable();
            $table->datetime('tanggal_update')->nullable();
            
            $table->index('kode_mak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mak');
    }
};
