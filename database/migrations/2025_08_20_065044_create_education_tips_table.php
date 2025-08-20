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
        Schema::create('education_tips', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the education tip');
            $table->text('description')->comment('Description of the education tip');
            $table->string('image')->nullable()->comment('Image URL for the education tip');
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade')
                  ->comment('ID of the user who created the tip');
            $table->foreignId('category_id')
                  ->constrained('lesson_categories')
                  ->onDelete('cascade')
                  ->comment('ID of the category for the education tip');
            $table->boolean('is_active')->default(true)->comment('Indicates if the tip is active');
            $table->integer('views')->default(0)->comment('Number of views for the education tip');
            $table->string('slug')->unique()->comment('Slug for the education tip');
            $table->string('tag')->comment('Tag for the education tip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_tips');
    }
};
