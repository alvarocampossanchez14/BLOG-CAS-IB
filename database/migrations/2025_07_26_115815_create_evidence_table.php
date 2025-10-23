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
        Schema::create('evidence', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->foreignId('activity_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidence');
    }


    //delete image when evidence or project is deleted
    public function deleteImage($filePath): void
    {
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $storagePath = storage_path('app/' . $filePath);
        if (file_exists($storagePath)) {
            unlink($storagePath);
        }   

    }

    public function deleteEvidence($evidenceId): void
    {
        $evidence = \App\Models\Evidence::find($evidenceId);
        if ($evidence) {
            $this->deleteImage($evidence->file_path);
            $evidence->delete();
        }
    }

};
