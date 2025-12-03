<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sengketa_persil', function (Blueprint $table) {
            $table->id('sengketa_id');

            $table->unsignedBigInteger('persil_id');

            $table->string('pihak_1')->nullable();
            $table->string('pihak_2')->nullable();
            $table->text('kronologi')->nullable();
            $table->string('status')->nullable(); 
            $table->text('penyelesaian')->nullable();

            $table->timestamps();

            $table->foreign('persil_id')
                ->references('persil_id')
                ->on('persil')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sengketa_persil');
    }
};
