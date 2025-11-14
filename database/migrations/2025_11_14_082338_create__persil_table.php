<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persil', function (Blueprint $table) {
            $table->id(); // otomatis persil_id
            $table->string('kode_persil')->unique();

            // tambahkan foreign key → WAJIB
            $table->unsignedBigInteger('pemilik_warga_id');

            $table->integer('luas_m2')->nullable();
            $table->string('penggunaan')->nullable();
            $table->string('alamat_lahan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->timestamps();

            // relasi FK ke tabel wargas
            $table->foreign('pemilik_warga_id')->references('id')->on('wargas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persil');
    }
};
