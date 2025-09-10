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
        Schema::create('task_item_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_patient_assignment_id')->constrained()->onDelete('cascade');
            $table->foreignId('task_item_id')->constrained()->onDelete('cascade');
            $table->foreignId('employee_profile_id')->constrained()->onDelete('cascade');
            $table->boolean('is_completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_item_answers');
    }
};
