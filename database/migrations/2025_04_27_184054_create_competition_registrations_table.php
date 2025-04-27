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
        // Pivot table linking Users (Athletes) to Competitions via Categories
        Schema::create('competition_registrations', function (Blueprint $table) {
            $table->id(); // Primary key for the registration record

            // Foreign key to the competition
            $table->foreignId('competition_id')
                  ->constrained('competitions')
                  ->cascadeOnDelete(); // If competition is deleted, registration is deleted

            // Foreign key to the user (athlete)
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete(); // If athlete user is deleted, registration is deleted

            // Foreign key to the specific category for this registration
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete(); // If category is deleted, registration is deleted

            // Status of the registration (important for workflow)
            $table->string('status')->default('pending')
                  ->index()
                  ->comment('e.g., pending, approved, rejected, payment_pending, checked_in, disqualified');

            // Optional: Measured weight at weigh-in (useful for Kumite)
            $table->decimal('weight_measured', 5, 2)->nullable()->comment('Weight in kg at weigh-in');

            // Optional: Participant number assigned for this competition
            $table->string('participant_number')->nullable();
            // Consider adding a unique constraint per competition if needed:
            // $table->unique(['competition_id', 'participant_number']);

            $table->timestamps(); // created_at (registration time), updated_at

            // Unique constraint: An athlete can only register once in the same category for the same competition
            $table->unique(['competition_id', 'user_id', 'category_id'], 'competition_user_category_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_registrations');
    }
};