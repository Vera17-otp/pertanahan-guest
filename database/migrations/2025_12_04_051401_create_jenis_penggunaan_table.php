<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_penggunaan', function (Blueprint $table) {
            // Primary Key
            $table->id('jenis_id');

            // UNIQUE
            $table->string('nama_penggunaan')->unique();

            // Kolom tambahan
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_penggunaan');
    }
};
