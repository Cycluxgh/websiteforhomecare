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
        Schema::create('employee_patient_assignment_slots', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('employee_patient_assignment_id');
    $table->foreign('employee_patient_assignment_id', 'epas_epa_id_fk')
        ->references('id')
        ->on('employee_patient_assignments')
        ->onDelete('cascade');

    $table->string('day_of_week');
    $table->time('start_time');
    $table->time('end_time');
    $table->timestamps();

    // Use a short name for the unique constraint
    $table->unique(
        ['employee_patient_assignment_id', 'day_of_week', 'start_time'],
        'epas_day_time_unique'
    );
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_patient_assignment_slots');
    }
};
