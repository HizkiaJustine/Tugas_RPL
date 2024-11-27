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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->string('PembayaranID')->primary();
            $table->date('TanggalPembayaran');
            $table->decimal('JumlahPembayaran', 10, places: 2);
            $table->enum('MetodePembayaran', ['Cash', 'Debit Card', 'Credit', 'QRIS']);
            $table->string('FakturID');
            $table->string('PasienID');
            $table->foreign(columns: 'FakturID')->references(columns: 'FakturID')->on(table: 'faktur')->onDelete('cascade');
            $table->foreign(columns: 'PasienID')->references(columns: 'PasienID')->on(table: 'pasien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
