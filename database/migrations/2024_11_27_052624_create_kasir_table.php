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
        Schema::create('kasir', function (Blueprint $table) {
            $table->string(column: 'KasirID')->primary();
            $table->string(column: 'NamaKasir', length: 100);
            $table->string(column: 'NomorHP', length: 15);
            $table->string(column: 'AlamatKasir');
            $table->enum(column: 'JenisKelamin', allowed: ['L', 'P']);
            $table->string('AccountID')->nullable()->index();
            $table->foreign('AccountID')->references('AccountID')->on('account');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_kasir
        BEFORE INSERT ON kasir
        FOR EACH ROW
        BEGIN
            SET NEW.KasirID = CONCAT("K", (SELECT IFNULL(MAX(CAST(SUBSTRING(KasirID, 2) AS UNSIGNED)), 0) + 1 FROM kasir));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_kasir');
        Schema::dropIfExists('kasir');
    }
};
