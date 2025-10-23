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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date')->nullable(); // Fecha de la actividad

            $table->string('location')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_contact')->nullable();

            // Reflexión y valoración
            $table->text('creativity')->nullable();
            $table->text('activity')->nullable();
            $table->text('service')->nullable();
            $table->text('evaluation')->nullable();
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
