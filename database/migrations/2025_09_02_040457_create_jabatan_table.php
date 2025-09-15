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
        Schema::create('jabatan', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('jabatan', 100)->nullable();
            $table->string('peran', 100)->nullable();
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
        Schema::dropIfExists('jabatan');
    }
};
