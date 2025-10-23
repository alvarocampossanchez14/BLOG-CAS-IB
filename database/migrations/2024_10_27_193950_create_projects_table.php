<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('slug')->nullable()->unique();
            $table->text('description'); 
            $table->date('start_date')->nullable(); 
            $table->date('end_date')->nullable(); 
            $table->enum('status', ['planned', 'ongoing', 'completed'])->default('planned'); 

            $table->string('location')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_contact')->nullable();
            
            // Campos de contenido
            $table->text('creativity')->nullable();
            $table->text('activity')->nullable();
            $table->text('service')->nullable();
            $table->text('evaluation_and_objectives')->nullable();
            $table->text('reflection')->nullable();

            $table->boolean('lo_1')->default(false)->nullable();
            $table->boolean('lo_2')->default(false)->nullable();
            $table->boolean('lo_3')->default(false)->nullable();
            $table->boolean('lo_4')->default(false)->nullable();
            $table->boolean('lo_5')->default(false)->nullable();
            $table->boolean('lo_6')->default(false)->nullable();
            $table->boolean('lo_7')->default(false)->nullable();

            $table->text('image')->nullable();
            $table->text('evidence')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps(); 
        });
    }


    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
