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
        Schema::table('peta__kerawanans', function (Blueprint $table) {
            $table->unsignedBigInteger('walas_id')->after('guru_id');
            $table->foreign('walas_id')->references('id')->on('walas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peta__kerawanans', function (Blueprint $table) {
            $table->dropForeign(['walas_id']);
            $table->dropColumn('walas_id');
        });
    }
};
