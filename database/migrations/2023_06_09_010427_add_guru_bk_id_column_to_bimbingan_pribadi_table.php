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
        Schema::table('bimbingan__pribadis', function (Blueprint $table) {
            $table->unsignedBigInteger('nama_guru_bk')->after('nama_siswa')->nullAble();
            $table->foreign('nama_guru_bk')->references('id')->on('gurus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bimbingan__pribadis', function (Blueprint $table) {
            $table->dropForeign(['nama_guru_bk']);
            $table->dropColumn('nama_guru_bk');
        });
    }
};
