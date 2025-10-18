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
        // Ganti 'pertanahan' menjadi 'dokumen_persil' sesuai permintaan
        Schema::create('dokumen_persil', function (Blueprint $table) {
            // 1. Primary Key (PK): dokumen_id
            $table->id('dokumen_id'); 

            // 2. Foreign Key (FK): persil_id
            // Asumsi tabel 'persil' ada dengan primary key 'id'
            // Gunakan 'unsignedBigInteger' untuk FK jika PK di tabel 'persil' adalah $table->id()
            $table->unsignedBigInteger('persil_id'); 
            
            // 3. Kolom Data
            $table->string('jenis_dokumen')->nullable();
            $table->string('nomor')->nullable();
            $table->text('keterangan')->nullable();

            // Kolom timestamps (created_at dan updated_at)
            $table->timestamps();

            // Menambahkan Foreign Key Constraint
            $table->foreign('persil_id')
                  ->references('id') // Sesuaikan 'id' jika PK tabel 'persil' berbeda
                  ->on('persil')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // Menggunakan cascade agar dokumen ikut terhapus jika persil dihapus (opsional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_persil');
    }
};