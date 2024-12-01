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
        Schema::create('obat', function (Blueprint $table) {
            $table->string('ObatID')->primary();
            $table->string('NamaObat', 100);
            $table->string('TipeObat', 50);
            $table->date('TanggalKadaluarsa');
            $table->integer('JumlahObat');
            $table->decimal('HargaObat', 10, 2);
            $table->string('ResepObatID');
            $table->foreign('ResepObatID')->references('ResepObatID')->on('resepobat')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_obat
        BEFORE INSERT ON obat
        FOR EACH ROW
        BEGIN
            SET NEW.ObatID = CONCAT("O", (SELECT IFNULL(MAX(CAST(SUBSTRING(ObatID, 2) AS UNSIGNED)), 0) + 1 FROM obat));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_obat');
        Schema::dropIfExists('obat');
    }
};
