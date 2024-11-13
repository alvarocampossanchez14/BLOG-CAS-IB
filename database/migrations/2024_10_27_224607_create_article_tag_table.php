<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade'); // Relación con la tabla articles
            $table->foreignId('tag_id')->constrained()->onDelete('cascade'); // Relación con la tabla tags
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
