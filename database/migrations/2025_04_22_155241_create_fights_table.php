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
        // Assuming 'fights' table corresponds to the 'Match' model
        Schema::create('fights', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('competition_id')->constrained('competitions')->onDelete('cascade'); // Denormalized for easier access

            // Link to Athletes. Set NULL if athlete is deleted to preserve fight record.
            $table->foreignId('athlete1_id')->nullable()->constrained('athletes')->onDelete('set null');
            $table->foreignId('athlete2_id')->nullable()->constrained('athletes')->onDelete('set null');
            $table->foreignId('winner_id')->nullable()->constrained('athletes')->onDelete('set null');

            // Fight details
            $table->integer('round_number')->unsigned()->nullable()->comment('Round in the bracket');
            $table->integer('match_number_in_round')->unsigned()->nullable()->index()->comment('Order within the round');
            $table->dateTime('scheduled_time')->nullable();
            $table->string('tatami_number')->nullable()->comment('Which mat/area');
            $table->string('status')->default('scheduled')->index()->comment('e.g., scheduled, ongoing, completed, cancelled, walkover');
            $table->integer('score_athlete1')->default(0);
            $table->integer('score_athlete2')->default(0);
            $table->string('result_details')->nullable()->comment('e.g., IPPON, HANSOKU, TIMEUP');

            $table->timestamps();

            // Useful indexes
            $table->index(['competition_id', 'status'], 'fights_competition_status_index');
            $table->index(['category_id', 'round_number', 'match_number_in_round'], 'fights_category_round_match_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fights');
    }
};