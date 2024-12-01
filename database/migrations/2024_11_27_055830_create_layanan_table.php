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
        Schema::create('layanan', function (Blueprint $table) {
            $table->string('LayananID')->primary();
            $table->string('NamaLayanan', 100);
            $table->decimal('HargaLayanan', 10, 2);
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_layanan
        BEFORE INSERT ON layanan
        FOR EACH ROW
        BEGIN
            SET NEW.LayananID = CONCAT("L", (SELECT IFNULL(MAX(CAST(SUBSTRING(LayananID, 2) AS UNSIGNED)), 0) + 1 FROM layanan));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_layanan');
        Schema::dropIfExists('layanan');
    }
};
