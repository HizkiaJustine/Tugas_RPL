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
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::dropIfExists('pembayaran');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
