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
        Schema::create('faktur', function (Blueprint $table) {
            $table->string('FakturID')->primary();
            $table->date('Tanggal');
            $table->decimal('TotalHarga', 10, 2);
            $table->string('PasienID');
            $table->string('LayananID');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'pasien')->onDelete('cascade');
            $table->foreign(columns: 'LayananID')->references(columns: 'LayananID')->on(table: 'layanan')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_faktur
        BEFORE INSERT ON faktur
        FOR EACH ROW
        BEGIN
            SET NEW.FakturID = CONCAT("F", (SELECT IFNULL(MAX(CAST(SUBSTRING(FakturID, 2) AS UNSIGNED)), 0) + 1 FROM faktur));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_faktur');
        Schema::dropIfExists('faktur');
    }
};
