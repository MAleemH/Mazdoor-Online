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
        Schema::table('jobs', function (Blueprint $table) {
            // Drop the columns
            $table->dropColumn(['assigned_user_id', 'job_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Add back the columns
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->string('job_status')->default('pending');
        });
    }
};
