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
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('application_id')->nullable()->constrained()->onDelete('cascade');

            // Basic Info
            $table->string('position')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable(); // for contract end or exit
            $table->string('employee_code')->nullable()->unique(); // internal ID

            // Contract Info
            $table->string('employment_type')->nullable(); // full-time, part-time, etc.
            $table->decimal('hourly_rate', 8, 2)->nullable();

            // Status & Flags
            $table->boolean('active')->default(true);
            $table->boolean('terminated')->default(false);
            $table->date('termination_date')->nullable();
            $table->text('termination_reason')->nullable();

            // Emergency Contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relationship')->nullable();

            // Notes / Admin
            $table->text('admin_notes')->nullable();

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_profiles');
    }
};
