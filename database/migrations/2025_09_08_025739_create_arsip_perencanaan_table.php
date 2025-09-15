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
        Schema::connection('perencanaan')->create('arsip_perencanaan', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->string('judul', 255);
            $table->string('file_path', 500)->nullable();
            $table->string('file_name', 255)->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('user_input', 50)->nullable();
            $table->datetime('tanggal_input')->nullable();
            $table->string('user_update', 50)->nullable();
            $table->datetime('tanggal_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('perencanaan')->dropIfExists('arsip_perencanaan');
    }
};
