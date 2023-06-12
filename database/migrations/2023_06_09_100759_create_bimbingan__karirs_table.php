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
        Schema::create('bimbingan__karirs', function (Blueprint $table) {
            $table->id();
            $table->text("alasan_pertemuan");
            $table->enum("tipe_bimbingan", ["Kerja","Wirausaha", "Kuliah"]);
            $table->date("tanggal_pertemuan")->nullable();
            $table->string("lokasi_pertemuan")->nullable();
            $table->text("solusi_guru")->nullable();
            $table->text("alasan_guru")->nullable();
            $table->string("status")->default("Menunggu");
            $table->string("tipe_request")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingan__karirs');
    }
};
