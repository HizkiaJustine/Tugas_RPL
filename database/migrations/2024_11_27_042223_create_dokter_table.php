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
        Schema::create('Dokter', function (Blueprint $table) {
            $table->string(column: 'DokterID')->primary();
            $table->string(column: 'NamaDokter', length: 100);
            $table->string(column: 'Departemen', length: 100);
            $table->string(column: 'AlamatDokter');
            $table->string(column: 'NomorHP', length: 15);
            $table->string(column: 'FotoDokter');
            $table->string('AccountID')->nullable()->index();
            $table->foreign('AccountID')->references('AccountID')->on('Account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Dokter');
    }
};
