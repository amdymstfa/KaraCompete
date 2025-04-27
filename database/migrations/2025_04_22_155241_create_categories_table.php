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

            // Foreign key linking to the competitions table
            $table->foreignId('competition_id')
                  ->constrained('competitions') // References 'id' on 'competitions' table
                  ->onDelete('cascade'); // If competition is deleted, delete its categories

            $table->string('name')->comment('Descriptive name, e.g., Cadet Male Kumite -60kg');
            $table->integer('min_age')->unsigned()->nullable();
            $table->integer('max_age')->unsigned()->nullable();
            $table->string('sex')->nullable()->index()->comment('e.g., male, female, mixed');
            $table->decimal('min_weight', 5, 2)->nullable();
            $table->decimal('max_weight', 5, 2)->nullable();
            $table->string('min_grade')->nullable();
            $table->string('max_grade')->nullable();
            $table->string('type')->index()->comment('e.g., kumite, kata'); // Indexed for filtering

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