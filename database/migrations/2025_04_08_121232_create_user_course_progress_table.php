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
        Schema::create('user_course_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            
            // Add the missing course_section_id column
            $table->unsignedBigInteger('course_section_id'); // Define the column here

            $table->tinyInteger('completed_section')->default(0);
            $table->json('completed_sections_ids')->nullable();
            $table->tinyInteger('pending_section')->nullable();
            $table->tinyInteger('completed_modules')->default(0);
            $table->json('completed_module_ids')->nullable();
            $table->tinyInteger('pending_module')->nullable();
            $table->boolean('awarded')->default(false);
            $table->timestamps();

            $table->unique(['user_id', 'course_id']);
            
            // Define the foreign key for course_section_id
            $table->foreign('course_section_id')->references('id')->on('course_sections')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_course_progress');
    }
};
