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
            $table->string('email_pengaju')->after('nama_pengaju');
            $table->string('wa_pengaju')->after('email_pengaju');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kampanyes', function (Blueprint $table) {
            $table->dropColumn(['email_pengaju', 'wa_pengaju']);
        });
    }
};
