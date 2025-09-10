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
        Schema::create('assignment_timesheet_summaries', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('employee_patient_assignment_id');
    $table->unsignedBigInteger('timesheet_id');
    $table->text('summary_text')->nullable();
    $table->timestamps();

    // Define shorter foreign key constraint names
    $table->foreign('employee_patient_assignment_id', 'fk_ep_assignment_id')
          ->references('id')
          ->on('employee_patient_assignments')
          ->onDelete('cascade');

    $table->foreign('timesheet_id', 'fk_timesheet_id')
          ->references('id')
          ->on('timesheets')
          ->onDelete('cascade');

    // Unique constraint
    $table->unique(['employee_patient_assignment_id', 'timesheet_id'], 'assignment_timesheet_unique_summary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_timesheet_summaries');
    }
};
