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
    Schema::create('guru_kelas', function (Blueprint $table) {
        $table->primary(['guru_id', 'kelas_id']); // Kunci utama gabungan
        $table->foreignId('guru_id')->constrained('gurus')->onDelete('cascade');
        $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_kelas');
    }
};
