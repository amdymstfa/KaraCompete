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
        Schema::create('user_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->foreignId('competition_id')
              ->nullable()
              ->constrained('competitions')
              ->cascadeOnDelete(); 
            // Statistic fields
            $table->integer('matches_played')->default(0);
            $table->integer('matches_won')->default(0);
            $table->integer('matches_lost')->default(0);
            $table->integer('matches_drawn')->default(0);
            $table->integer('points_scored')->default(0);
            $table->integer('points_conceded')->default(0);
            // Add more specific stats like 'ippons_scored' if needed

            $table->timestamp('last_calculated_at')->nullable()->comment('When these stats were last updated');
            $table->timestamps();

            // Ensure one stats record per user (or per user per competition)
            $table->unique(['user_id'], 'user_stats_user_unique');
            // Or: $table->unique(['user_id', 'competition_id'], 'user_stats_user_comp_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_statistics');
    }
};