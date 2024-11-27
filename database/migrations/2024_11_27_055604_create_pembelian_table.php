<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
