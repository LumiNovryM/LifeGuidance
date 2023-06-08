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
        Schema::create('bimbingan__belajars', function (Blueprint $table) {
            $table->id();
            $table->string("nama_siswa");
            $table->string("nama_guru_bk");
            $table->string("nama_kelas");
            $table->string("nama_walas");
            $table->text("alasan_pertemuan");
            $table->date("tanggal_pertemuan")->nullable();
            $table->string("lokasi_pertemuan")->nullable();
            $table->text("solusi_guru")->nullable();
            $table->text("alasan_guru")->nullable();
            $table->string("status")->default("Menunggu");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingan__belajars');
    }
};
