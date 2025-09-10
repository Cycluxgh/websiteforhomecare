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
        // Create profile_categories table
        Schema::create('profile_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create profile_sub_categories table
        Schema::create('profile_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create profile_questions table with polymorphic relationship
        Schema::create('profile_questions', function (Blueprint $table) {
            $table->id();
            $table->morphs('questionable');
            $table->text('question_text');
            $table->string('question_type');
            $table->json('options')->nullable();
            $table->timestamps();
        });

        // Create patient_profiles table
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->unique()->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create patient_profile_answers table (pivot table)
        Schema::create('patient_profile_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_profile_id')->constrained()->onDelete('cascade');
            $table->foreignId('profile_question_id')->constrained()->onDelete('cascade');
            $table->text('answer')->nullable(); // Polymorphic storage for answers
            $table->timestamps();

            // Unique constraint to ensure one answer per question per profile
            $table->unique(['patient_profile_id', 'profile_question_id'], 'unique_answer_per_profile_question');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_profile_answers');
        Schema::dropIfExists('patient_profiles');
        Schema::dropIfExists('profile_questions');
        Schema::dropIfExists('profile_sub_categories');
        Schema::dropIfExists('profile_categories');
    }
};
