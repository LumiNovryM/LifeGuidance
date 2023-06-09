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
            $table->unsignedBigInteger('nama_siswa')->after('id')->nullAble();
            $table->foreign('nama_siswa')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bimbingan__pribadis', function (Blueprint $table) {
            $table->dropForeign(['nama_siswa']);
            $table->dropColumn('nama_siswa');
        });
    }
};
