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
        Schema::create('reference_requests', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('referee_first_name');
    $table->string('referee_last_name');
    $table->string('referee_email');
    $table->string('referee_phone')->nullable();
    $table->string('referee_job_title')->nullable();
    $table->string('referee_company')->nullable();
    $table->string('applicant_full_name');
    $table->date('employment_from')->nullable();
    $table->date('employment_to')->nullable();
    $table->boolean('reemploy')->nullable();
    // Section 1: Ratings (e.g., store as strings or integers mapped to Excellent=4, Good=3, etc.)
    $table->string('care_plans_rating')->nullable();
    $table->string('reliability_rating')->nullable();
    $table->string('character_rating')->nullable();
    $table->string('attitude_rating')->nullable();
    $table->string('dignity_rating')->nullable();
    $table->string('communication_rating')->nullable();
    $table->string('relationships_rating')->nullable();
    $table->string('initiative_rating')->nullable();
    // Section 2: Yes/No Questions
    $table->boolean('disciplinary_action')->nullable();
    $table->boolean('safeguarding_investigations')->nullable();
    $table->boolean('not_suitable_for_vulnerable')->nullable();
    $table->boolean('criminal_offense')->nullable();
    $table->text('additional_comments')->nullable();
    $table->boolean('confirmed_accuracy')->default(false);
    $table->string('signature')->nullable(); // Store signature as file path or text
    $table->string('company_stamp')->nullable(); // Store file path for uploaded stamp
    $table->boolean('confirmed_storage')->default(false);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_requests');
    }
};
