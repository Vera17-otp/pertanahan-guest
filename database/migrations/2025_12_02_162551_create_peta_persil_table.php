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
        Schema::create('peta_persil', function (Blueprint $table) {
            // 1. Primary Key (PK): peta_id
            $table->id('peta_id');

            // 2. Foreign Key (FK): persil_id
            $table->unsignedBigInteger('persil_id');

            // 3. Kolom Data
            $table->longText('geojson')->nullable();
            $table->decimal('panjang_m', 10, 2)->nullable();
            $table->decimal('lebar_m', 10, 2)->nullable();

            // Kolom timestamps (created_at dan updated_at)
            $table->timestamps();

            // Menambahkan Foreign Key Constraint (optional, sama seperti contohmu: dikomentari)
            // $table->foreign('persil_id')
            //       ->references('persil_id') 
            //       ->on('persil')
            //       ->onUpdate('cascade')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peta_persil');
    }
};
