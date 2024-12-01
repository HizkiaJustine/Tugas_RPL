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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->string('PembelianID')->primary();
            $table->date('TanggalPembelian');
            $table->string('SupplierID');
            $table->string('ObatID');
            $table->integer('Kuantitas');
            $table->decimal('Harga', 10, 2);
            $table->foreign(columns: 'SupplierID')->references(columns: 'SupplierID')->on(table: 'supplier')->onDelete('cascade');
            $table->foreign(columns: 'ObatID')->references(columns: 'ObatID')->on(table: 'obat')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_pembelian
        BEFORE INSERT ON pembelian
        FOR EACH ROW
        BEGIN
            SET NEW.PembelianID = CONCAT("PB", (SELECT IFNULL(MAX(CAST(SUBSTRING(PembelianID, 3) AS UNSIGNED)), 0) + 1 FROM pembelian));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_pembelian');
        Schema::dropIfExists('pembelian');
    }
};
