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
        Schema::table('bimbingan__sosials', function (Blueprint $table) {
            $table->unsignedBigInteger('diajukan')->after('kelas_id');
            $table->foreign('diajukan')->references('id')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bimbingan__sosials', function (Blueprint $table) {
            $table->dropForeign(['diajukan']);
            $table->dropColumn('diajukan');
        });
    }
};
