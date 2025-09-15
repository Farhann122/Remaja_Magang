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
        Schema::create('nota_dinas_revisi', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nomor', 50)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('satker', 10)->nullable();
            $table->integer('id_ppk')->nullable();
            $table->string('nama_ppk', 100)->nullable();
            $table->string('jabatan_ppk', 100)->nullable();
            $table->string('nomor_ppk', 100)->nullable();
            $table->integer('id_eselon')->nullable();
            $table->string('nama_eselon', 100)->nullable();
            $table->string('jabatan_eselon', 100)->nullable();
            $table->string('nomor_eselon', 100)->nullable();
            $table->integer('id_satker')->nullable();
            $table->string('nama_satker', 100)->nullable();
            $table->string('perihal', 255)->nullable();
            $table->text('isi')->nullable();
            $table->string('file_name', 100)->nullable();
            $table->string('file_type', 100)->nullable();
            $table->integer('file_size')->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->string('user_input', 100)->nullable();
            $table->datetime('tanggal_input')->nullable();
            $table->string('user_update', 100)->nullable();
            $table->datetime('tanggal_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_dinas_revisi');
    }
};
