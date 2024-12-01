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
        Schema::create('supplier', function (Blueprint $table) {
            $table->string('SupplierID')->primary();
            $table->string('NamaSupplier', 100);
            $table->string('NomorHP', 15);
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_supplier
        BEFORE INSERT ON supplier
        FOR EACH ROW
        BEGIN
            SET NEW.SupplierID = CONCAT("S", (SELECT IFNULL(MAX(CAST(SUBSTRING(SupplierID, 2) AS UNSIGNED)), 0) + 1 FROM supplier));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_supplier');
        Schema::dropIfExists('supplier');
    }
};
