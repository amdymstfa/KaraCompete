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
        Schema::create('global_statistics', function (Blueprint $table) {
            $table->id();

            // Optional: Link if stats are per-competition
            $table->foreignId('competition_id')
                  ->nullable()
                  ->constrained('competitions')
                  ->onDelete('cascade');

            // Statistic fields
            $table->integer('total_athletes')->default(0);
            $table->integer('total_matches_scheduled')->default(0);
            $table->integer('total_matches_completed')->default(0);
            $table->bigInteger('total_points_scored')->default(0); // Use bigInteger if scores can be very high

            $table->timestamp('calculation_date')->comment('When this snapshot was calculated');
            $table->timestamps();

            // Ensure unique stats per competition per calculation date (if applicable)
             $table->unique(['competition_id', 'calculation_date'], 'global_stats_comp_date_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_statistics');
    }
};  