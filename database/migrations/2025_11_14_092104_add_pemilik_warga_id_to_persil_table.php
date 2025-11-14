<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('persil', function (Blueprint $table) {
        $table->unsignedBigInteger('pemilik_warga_id')->nullable()->after('kode_persil');
    });
}

public function down()
{
    Schema::table('persil', function (Blueprint $table) {
        $table->dropColumn('pemilik_warga_id');
    });
}

};
