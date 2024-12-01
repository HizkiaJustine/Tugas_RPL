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
        Schema::create('pasien', function (Blueprint $table) {
            $table->string('PasienID')->primary();
            $table->string('NamaPasien', length:100);
            $table->integer(column: 'UmurPasien');
            $table->string(column: 'AlamatPasien');
            $table->decimal(column: 'BeratBadanPasien', total: 5, places: 2);
            $table->decimal(column: 'TinggiBadanPasien', total: 5, places: 2);
            $table->date(column: 'TanggalLahirPasien');
            $table->enum(column: 'JenisKelamin', allowed: ['L', 'P']);
            $table->string(column: 'NomorHP', length: 15);
            $table->string('AccountID')->nullable()->index();
            $table->foreign('AccountID')->references('AccountID')->on('account');
        });

        DB::unprepared('
            CREATE TRIGGER before_insert_pasien
            BEFORE INSERT ON pasien
            FOR EACH ROW
            BEGIN
                SET NEW.PasienID = CONCAT("P", (SELECT IFNULL(MAX(CAST(SUBSTRING(PasienID, 2) AS UNSIGNED)), 0) + 1 FROM pasien));
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_pasien');
        Schema::dropIfExists('pasien');
    }
};
