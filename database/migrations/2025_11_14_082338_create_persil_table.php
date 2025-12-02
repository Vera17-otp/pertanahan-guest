<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('persil', function (Blueprint $table) {

            if (!Schema::hasColumn('persil', 'kode_persil')) {
                $table->string('kode_persil')->unique()->after('id');
            }

            if (!Schema::hasColumn('persil', 'pemilik_warga_id')) {
                $table->unsignedBigInteger('pemilik_warga_id')->after('kode_persil');
            }

            if (!Schema::hasColumn('persil', 'luas_m2')) {
                $table->integer('luas_m2')->nullable()->after('pemilik_warga_id');
            }

            if (!Schema::hasColumn('persil', 'penggunaan')) {
                $table->string('penggunaan')->nullable()->after('luas_m2');
            }

            if (!Schema::hasColumn('persil', 'alamat_lahan')) {
                $table->string('alamat_lahan')->nullable()->after('penggunaan');
            }

            if (!Schema::hasColumn('persil', 'rt')) {
                $table->string('rt')->nullable()->after('alamat_lahan');
            }

            if (!Schema::hasColumn('persil', 'rw')) {
                $table->string('rw')->nullable()->after('rt');
            }

            // FK (hanya kalau belum ada!)
            if (!Schema::hasColumn('persil', 'pemilik_warga_id')) {
                $table->foreign('pemilik_warga_id')->references('id')->on('wargas')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('persil', function (Blueprint $table) {

            if (Schema::hasColumn('persil', 'pemilik_warga_id')) {
                $table->dropForeign(['pemilik_warga_id']);
                $table->dropColumn('pemilik_warga_id');
            }

            if (Schema::hasColumn('persil', 'kode_persil')) {
                $table->dropColumn('kode_persil');
            }

            if (Schema::hasColumn('persil', 'luas_m2')) {
                $table->dropColumn('luas_m2');
            }

            if (Schema::hasColumn('persil', 'penggunaan')) {
                $table->dropColumn('penggunaan');
            }

            if (Schema::hasColumn('persil', 'alamat_lahan')) {
                $table->dropColumn('alamat_lahan');
            }

            if (Schema::hasColumn('persil', 'rt')) {
                $table->dropColumn('rt');
            }

            if (Schema::hasColumn('persil', 'rw')) {
                $table->dropColumn('rw');
            }
        });
    }
};
