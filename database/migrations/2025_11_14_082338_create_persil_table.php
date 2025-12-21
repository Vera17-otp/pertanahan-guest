<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persil', function (Blueprint $table) {
            $table->id('persil_id');

            $table->string('kode_persil')->unique();

            $table->unsignedBigInteger('pemilik_warga_id')->nullable();

            $table->integer('luas_m2')->nullable();
            $table->string('penggunaan')->nullable();
            $table->string('alamat_lahan')->nullable();

            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();

            $table->timestamps();

            // FOREIGN KEY BENAR
            $table->foreign('pemilik_warga_id')
                  ->references('warga_id')->on('warga')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persil');
    }
};
