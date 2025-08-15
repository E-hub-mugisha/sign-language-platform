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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('language')->default('English'); // or Kinyarwanda
            $table->foreignId('category_id')->nullable()->constrained('lesson_categories')->onDelete('set null');
            $table->string('video_url');
            $table->string('thumbnail_url')->nullable();
            $table->string('pdf_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('tutor_id')->nullable()->constrained('users')->cascadeOnDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
