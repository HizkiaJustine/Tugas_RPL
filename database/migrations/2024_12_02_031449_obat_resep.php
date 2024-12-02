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
            $table->id();
            $table->string('ObatID');
            $table->string('ResepObatID');
            $table->foreign('ObatID')->references('ObatID')->on('obat')->onDelete('cascade');
            $table->foreign('ResepObatID')->references('ResepObatID')->on('resep_obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
