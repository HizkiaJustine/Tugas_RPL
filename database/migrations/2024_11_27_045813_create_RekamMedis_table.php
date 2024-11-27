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
        Schema::create('RekamMedis', function (Blueprint $table) {
            $table->string('RekamMedisID')->primary();
            $table->date(column: 'Tanggal');
            $table->string(column: 'PasienID');
            $table->string(column: 'DokterID');
            $table->text('HasilDiagnosa');
            $table->text('Perawatan');
            $table->text('ResepObat');
            $table->text('HasilLab');
            $table->foreign(columns: 'DokterID')->references(columns: 'DokterID')->on(table: 'Dokter')->onDelete('cascade');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'Pasien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RekamMedis');
    }
};
