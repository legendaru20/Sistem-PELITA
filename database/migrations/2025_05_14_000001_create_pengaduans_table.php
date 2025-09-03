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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik', 16);
            $table->string('nomor_wa', 15);
            $table->string('email');
            $table->string('lokasi_pengaduan');
            $table->text('deskripsi_pengaduan');
            $table->json('lampiran_foto');
            $table->enum('status', ['pending', 'sedang_diatasi', 'telah_selesai', 'ditolak'])->default('pending');
            $table->string('dinas_penanggung_jawab')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};