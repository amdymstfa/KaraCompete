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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Descriptive and unique name
            $table->string('name')->unique();

            // Type: Kata or Kumite
            $table->enum('type', ['Kata', 'Kumite'])->index();

            // Gender: Male, Female, or Mixed
            $table->enum('gender', ['Male', 'Female', 'Mixed'])->index();

            // Age Range (String for flexibility like "18-25", "Senior", "U14")
            $table->string('age_range')->nullable()->index();

            // Weight Range (for Kumite, nullable for Kata/Open)
            $table->unsignedSmallInteger('min_weight')->nullable()->comment('Min weight in kg (inclusive)');
            $table->unsignedSmallInteger('max_weight')->nullable()->comment('Max weight in kg (inclusive)');

            // Grade/Belt Range (Optional)
            $table->string('min_grade')->nullable()->comment('E.g., Blue Belt');
            $table->string('max_grade')->nullable()->comment('E.g., Black Belt');

            // Optional description
            $table->text('description')->nullable();

            // Status for hiding old categories
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};