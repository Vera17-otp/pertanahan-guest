<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('persil', function (Blueprint $table) {

            // HANYA tambah kolom jika belum ada
            if (!Schema::hasColumn('persil', 'pemilik_warga_id')) {
                $table->unsignedBigInteger('pemilik_warga_id')->nullable()->after('kode_persil');
            }
        });
    }

    public function down()
    {
        Schema::table('persil', function (Blueprint $table) {

            // HANYA hapus kolom jika ada
            if (Schema::hasColumn('persil', 'pemilik_warga_id')) {
                $table->dropColumn('pemilik_warga_id');
            }
        });
    }
};
