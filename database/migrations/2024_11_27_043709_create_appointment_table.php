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
        Schema::create('appointment', function (Blueprint $table) {
            $table->string('AppointmentID')->primary();
            $table->dateTime(column: 'TanggalJam');
            $table->string(column: 'DokterID');
            $table->string(column: 'PasienID');
            $table->string('Tujuan');
            $table->enum('Status', ['Selesai', 'Batal', 'Ongoing']);
            $table->foreign(columns: 'DokterID')->references(columns: 'DokterID')->on(table: 'dokter')->onDelete('cascade');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'pasien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};