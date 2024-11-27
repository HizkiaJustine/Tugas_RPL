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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
