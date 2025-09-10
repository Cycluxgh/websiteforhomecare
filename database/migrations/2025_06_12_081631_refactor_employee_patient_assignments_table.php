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
    Schema::table('employee_patient_assignments', function (Blueprint $table) {
        // Drop foreign keys if they are involved in the index constraint
        $table->dropForeign(['employee_profile_id']);
        $table->dropForeign(['patient_id']);

        // Now you can safely drop the unique index
        $table->dropUnique('employee_patient_unique');

        // Drop the columns
        $table->dropColumn('assigned_date');
        $table->dropColumn('end_date');
        $table->dropColumn('assigned_days');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_patient_assignments', function (Blueprint $table) {
            // Re-add the columns and unique constraint if you need to reverse this migration
            // Note: This is simplified for rollback. In a real scenario, consider data implications.
            $table->timestamp('assigned_date')->nullable(); // Or non-nullable based on original
            $table->timestamp('end_date')->nullable();
            $table->json('assigned_days')->nullable(); // Re-add if it was there

            // Re-add the unique constraint
            $table->unique(['employee_profile_id', 'patient_id', 'assigned_date'], 'employee_patient_unique');
        });
    }
};
