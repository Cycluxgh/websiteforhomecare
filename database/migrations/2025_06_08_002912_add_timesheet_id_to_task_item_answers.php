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
        Schema::table('task_item_answers', function (Blueprint $table) {
            // Add timesheet_id as a nullable foreign key
            $table->foreignId('timesheet_id')
                  ->nullable() // Make it nullable if tasks can be marked outside a clocked-in shift
                  ->constrained('timesheets') // Constrain to the 'timesheets' table
                  ->onDelete('set null'); // If a timesheet is deleted, set timesheet_id to null
            $table->index('timesheet_id'); // Add an index for faster lookups
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_item_answers', function (Blueprint $table) {
            $table->dropForeign(['timesheet_id']);
            $table->dropIndex(['timesheet_id']);
            $table->dropColumn('timesheet_id');
        });
    }
};
