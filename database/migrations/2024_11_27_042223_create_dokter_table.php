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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('dokter', function (Blueprint $table) {
            $table->string(column: 'DokterID')->primary();
            $table->string(column: 'NamaDokter', length: 100);
            $table->string(column: 'Departemen', length: 100);
            $table->string(column: 'AlamatDokter');
            $table->string(column: 'NomorHP', length: 15);
            $table->string(column: 'FotoDokter');
            $table->string('LayananID');
            $table->string('AccountID')->nullable()->index();
            $table->foreign('LayananID')->references('LayananID')->on('layanan');
            $table->foreign('AccountID')->references('AccountID')->on('account');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::unprepared('
        CREATE TRIGGER before_insert_dokter
        BEFORE INSERT ON dokter
        FOR EACH ROW
        BEGIN
            SET NEW.DokterID = CONCAT("D", (SELECT IFNULL(MAX(CAST(SUBSTRING(DokterID, 2) AS UNSIGNED)), 0) + 1 FROM dokter));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_dokter');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('dokter');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
