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
        Schema::create('question', function (Blueprint $table) {
            $table->string(column: 'QuestionID')->primary();
            $table->string('AccountID');
            $table->text('question');
            $table->timestamps();

            $table->foreign('AccountID')->references('AccountID')->on('account')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_question
        BEFORE INSERT ON question
        FOR EACH ROW
        BEGIN
            SET NEW.QuestionID = CONCAT("Q", (SELECT IFNULL(MAX(CAST(SUBSTRING(QuestionID, 2) AS UNSIGNED)), 0) + 1 FROM question));
        END
        ');

        Schema::create('answer', function (Blueprint $table) {
            $table->string(column: 'AnswerID')->primary();
            $table->string('QuestionID');
            $table->string('AccountID');
            $table->text('answer');
            $table->timestamps();

            $table->foreign('QuestionID')->references('QuestionID')->on('question')->onDelete('cascade');
            $table->foreign('AccountID')->references('AccountID')->on('account')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER before_insert_answer
        BEFORE INSERT ON answer
        FOR EACH ROW
        BEGIN
            SET NEW.AnswerID = CONCAT("AN", (SELECT IFNULL(MAX(CAST(SUBSTRING(AnswerID, 2) AS UNSIGNED)), 0) + 1 FROM answer));
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_question');
        Schema::dropIfExists('question');
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_answer');
        Schema::dropIfExists('answer');
    }
};
