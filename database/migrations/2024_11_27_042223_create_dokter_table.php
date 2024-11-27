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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
