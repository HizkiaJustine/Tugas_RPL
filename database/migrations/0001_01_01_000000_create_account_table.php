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
        Schema::create('account', function (Blueprint $table) {
            $table->string(column: 'AccountID')->primary();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum(column: 'Role', allowed: ['Administrator', 'Dokter', 'Pasien', 'Kasir']);
            $table->rememberToken();
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
        Schema::dropIfExists('sessions');
    }
};
