<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->string('AppointmentID')->primary();
            $table->date('TanggalJanjiTemu');
            $table->time('JamJanjiTemu');
            $table->string(column: 'DokterID');
            $table->string(column: 'PasienID');
            $table->string('Tujuan');
            $table->enum('Status', ['Selesai', 'Batal', 'Ongoing']);
            $table->foreign(columns: 'DokterID')->references(columns: 'DokterID')->on(table: 'dokter')->onDelete('cascade');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'pasien')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_appointment
        BEFORE INSERT ON appointment
        FOR EACH ROW
        BEGIN
            SET NEW.AppointmentID = CONCAT("A", (SELECT IFNULL(MAX(CAST(SUBSTRING(AppointmentID, 2) AS UNSIGNED)), 0) + 1 FROM appointment));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_appointment');
        Schema::dropIfExists('appointment');
    }
};