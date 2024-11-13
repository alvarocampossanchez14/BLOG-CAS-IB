<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título del artículo
            $table->text('description'); // Descripción
            $table->string('purpose'); // Propósito
            $table->text('reflections'); // Reflexiones
            $table->text('creativity'); // Creatividad
            $table->text('activity'); // Actividad
            $table->text('service'); // Servicio
            $table->text('context'); // Contexto
            $table->text('evaluation'); // Evaluación
            $table->text('sustainability'); // Sostenibilidad
            $table->string('visual_caption'); // Captura visual
            $table->boolean('is_published')->default(false); // Estado de publicación
            $table->timestamp('published_at')->nullable(); // Fecha de publicación
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relación con la categoría
            $table->string('slug')->unique(); // Slug único para SEO
            $table->string('image')->nullable(); // Ruta de la imagen
            $table->string('visual_documentation')->nullable(); // Ruta de la documentación visual
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
