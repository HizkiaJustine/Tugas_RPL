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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
