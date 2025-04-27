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
        Schema::create('referees', function (Blueprint $table) {
            $table->id();

            // Foreign key linking to the users table (One-to-One with User)
            $table->foreignId('user_id')
                  ->unique() // Ensures one referee profile per user
                  ->constrained('users')
                  ->onDelete('cascade'); // If the user is deleted, delete the referee profile

            // Referee-specific information
            $table->string('certification_level')->nullable();
            // Add other specific fields here, e.g., grade if different from user's grade

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referees');
    }
};