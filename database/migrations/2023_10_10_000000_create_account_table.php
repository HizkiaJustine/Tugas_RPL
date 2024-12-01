<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('account', function (Blueprint $table) {
            $table->string('AccountID')->primary();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('Role', ['Administrator', 'Dokter', 'Pasien', 'Kasir']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->nullable()->index();
            $table->foreign('user_id')->references('AccountID')->on('account');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        DB::unprepared('
            CREATE TRIGGER before_insert_account
            BEFORE INSERT ON account
            FOR EACH ROW
            BEGIN
                SET NEW.AccountID = CONCAT("AC", (SELECT IFNULL(MAX(CAST(SUBSTRING(AccountID, 2) AS UNSIGNED)), 0) + 1 FROM account));
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_account');
        Schema::dropIfExists('account');
        Schema::dropIfExists('sessions');
    }
};