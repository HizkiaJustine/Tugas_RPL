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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->string('KaryawanID')->primary();
            $table->string(column: 'NamaKaryawan', length: 100);
            $table->string('Jabatan', 100);
            $table->string(column: 'NomorHP', length: 15);
            $table->string(column: 'AlamatKaryawan');
            $table->enum(column: 'JenisKelamin', allowed: ['L', 'P']);
            $table->string('AccountID')->nullable()->index();
            $table->foreign('AccountID')->references('AccountID')->on('account');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_karyawan
        BEFORE INSERT ON karyawan
        FOR EACH ROW
        BEGIN
            SET NEW.KaryawanID = CONCAT("KR", (SELECT IFNULL(MAX(CAST(SUBSTRING(KaryawanID, 3) AS UNSIGNED)), 0) + 1 FROM karyawan));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_karyawan');
        Schema::dropIfExists('karyawan');
    }
};
