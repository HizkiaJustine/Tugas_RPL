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
        Schema::create('resepobat', function (Blueprint $table) {
            $table->string('ResepObatID')->primary();
            $table->date('Tanggal');
            $table->string(column: 'DokterID');
            $table->string(column: 'PasienID');
            $table->text('ListObat');
            $table->text('DosisObat');
            $table->text('InstruksiPenggunaanObat');
            $table->foreign(columns: 'DokterID')->references(columns: 'DokterID')->on(table: 'dokter')->onDelete('cascade');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'pasien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resepobat');
    }
};
