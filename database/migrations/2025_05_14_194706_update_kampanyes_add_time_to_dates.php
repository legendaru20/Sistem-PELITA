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
        Schema::table('kampanyes', function (Blueprint $table) {
            // Ubah tipe kolom dari date menjadi datetime
            $table->datetime('tanggal_mulai')->change();
            $table->datetime('tanggal_selesai')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kampanyes', function (Blueprint $table) {
            // Kembalikan ke tipe date jika rollback
            $table->date('tanggal_mulai')->change();
            $table->date('tanggal_selesai')->change();
        });
    }
};
