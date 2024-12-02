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
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->string('ResepObatID')->primary();
            $table->date('Tanggal');
            $table->string(column: 'DokterID');
            $table->string(column: 'PasienID');
            $table->text('DosisObat');
            $table->text('InstruksiPenggunaanObat');
            $table->foreign(columns: 'DokterID')->references(columns: 'DokterID')->on(table: 'dokter')->onDelete('cascade');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'pasien')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_resep_obat
        BEFORE INSERT ON resep_obat
        FOR EACH ROW
        BEGIN
            SET NEW.ResepObatID = CONCAT("R", (SELECT IFNULL(MAX(CAST(SUBSTRING(ResepObatID, 2) AS UNSIGNED)), 0) + 1 FROM resep_obat));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_resep_obat');
        Schema::dropIfExists('resep_obat');
    }
};
