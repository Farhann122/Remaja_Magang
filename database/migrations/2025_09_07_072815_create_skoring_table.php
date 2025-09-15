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
        Schema::create('skoring', function (Blueprint $table) {
            $table->id();
            $table->string('operator');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('kategori');
            $table->string('umur_ekonomis');
            $table->string('jenis_barang');
            $table->string('sifat_barang');
            $table->text('keterangan');
            $table->tinyInteger('status')->default(1);
            $table->string('user_input')->nullable();
            $table->timestamp('tanggal_input')->nullable();
            $table->string('user_update')->nullable();
            $table->timestamp('tanggal_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skoring');
    }
};