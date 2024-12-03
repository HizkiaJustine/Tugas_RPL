<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->string('articleId');
            $table->string('dokterID');
            $table->string('title');
            $table->text('content');
            $table->date('publishDate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}