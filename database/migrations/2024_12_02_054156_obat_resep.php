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
        Schema::create('obat_resep', function (Blueprint $table) {
            $table->string('ObatID');  // Mengacu ke Obat
            $table->string('ResepObatID');  // Mengacu ke ResepObat
            $table->string('DosisObat');  // Kolom tambahan untuk dosis obat

            // Menambahkan foreign keys
            $table->foreign('ObatID')->references('ObatID')->on('obat')->onDelete('cascade');
            $table->foreign('ResepObatID')->references('ResepObatID')->on('resep_obat')->onDelete('cascade');

            // Menentukan composite key (gabungan primary key)
            $table->primary(['ObatID', 'ResepObatID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_resep');
    }
};
