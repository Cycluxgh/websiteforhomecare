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
            // Using a JSON column to store selected days (e.g., ['monday', 'wednesday'])
            $table->json('assigned_days')->nullable()->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_patient_assignments', function (Blueprint $table) {
            $table->dropColumn('assigned_days');
        });
    }
};
