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
        Schema::create('kampanyes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju');
            $table->string('nik');
            $table->string('judul_kampanye');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('proposal');
            $table->string('thumbnail');
            $table->json('banner_images');
            $table->string('rekening_donasi');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampanyes');
    }
};
