<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    public function up()
    {
        Schema::create('project_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Relación con la tabla projects
            $table->foreignId('tag_id')->constrained()->onDelete('cascade'); // Relación con la tabla tags
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
}
