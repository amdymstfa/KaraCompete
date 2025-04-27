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
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();

            // Foreign key linking to the users table (One-to-One with User)
            // Assumes an athlete MUST have a user account.
            $table->foreignId('user_id')
                  ->unique() // Ensures one athlete profile per user
                  ->constrained('users') // References the 'id' column on the 'users' table
                  ->onDelete('cascade'); // If the user is deleted, delete the athlete profile too

            // Athlete-specific information (if not stored directly on User model)
            // Example: Weight might be recorded here or per category registration
            $table->decimal('weight', 5, 2)->nullable()->comment('Current or reference weight, e.g., 65.50 kg');

            // Add other specific fields here if you decided to move them from the User model
            // $table->string('some_athlete_specific_field')->nullable();

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};