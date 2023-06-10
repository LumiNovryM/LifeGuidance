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
        Schema::create('peta__kerawanans', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("sering_sakit")->default(0)->comment('0 = false, 1 = true');
            $table->tinyInteger("sering_izin")->default(0);
            $table->tinyInteger("sering_alpha")->default(0);
            $table->tinyInteger("sering_terlambat")->default(0);
            $table->tinyInteger("bolos")->default(0);
            $table->tinyInteger("kelainan_jasmani")->default(0);
            $table->tinyInteger("minat_belajar_kurang")->default(0);
            $table->tinyInteger("introvert")->default(0);
            $table->tinyInteger("tinggal_dengan_wali")->default(0);
            $table->tinyInteger("kemampuan_kurang")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peta__kerawanans');
    }
};
