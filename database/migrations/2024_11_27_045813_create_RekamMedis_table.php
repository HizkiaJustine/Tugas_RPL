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
        Schema::create('rekammedis', function (Blueprint $table) {
            $table->string('RekamMedisID')->primary();
            $table->date(column: 'Tanggal');
            $table->string(column: 'PasienID');
            $table->string(column: 'DokterID');
            $table->text('HasilDiagnosa');
            $table->text('Perawatan');
            $table->text('ResepObat');
            $table->text('HasilLab');
            $table->foreign(columns: 'DokterID')->references(columns: 'DokterID')->on(table: 'dokter')->onDelete('cascade');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'pasien')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_rekam_medis
        BEFORE INSERT ON rekammedis
        FOR EACH ROW
        BEGIN
            SET NEW.RekamMedisID = CONCAT("RM", (SELECT IFNULL(MAX(CAST(SUBSTRING(RekamMedisID, 3) AS UNSIGNED)), 0) + 1 FROM rekammedis));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_rekammedis');
        Schema::dropIfExists('rekammedis');
    }
};
