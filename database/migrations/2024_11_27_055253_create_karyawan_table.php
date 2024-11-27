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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->string('KaryawanID')->primary();
            $table->string(column: 'NamaKaryawan', length: 100);
            $table->string('Jabatan', 100);
            $table->string(column: 'NomorHP', length: 15);
            $table->string(column: 'AlamatKaryawan');
            $table->enum(column: 'JenisKelamin', allowed: ['L', 'P']);
            $table->string('AccountID')->nullable()->index();
            $table->foreign('AccountID')->references('AccountID')->on('account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
