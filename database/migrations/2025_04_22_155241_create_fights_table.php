<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('competition_id')->constrained('competitions')->cascadeOnDelete();

            // Link to Athletes (Users)
            $table->foreignId('athlete1_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('athlete2_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('winner_id')->nullable()->constrained('users')->nullOnDelete();

            // === AJOUT RECOMMANDÉ : Lien vers l'Arbitre ===
            $table->foreignId('referee_id')->nullable()->constrained('users')->nullOnDelete();
            // ==============================================

            // Fight details
            $table->integer('round_number')->unsigned()->nullable();
            $table->integer('match_number_in_round')->unsigned()->nullable()->index();
            $table->dateTime('scheduled_time')->nullable();
            $table->string('tatami_number')->nullable();
            $table->string('status')->default('scheduled')->index()->comment('e.g., scheduled, ongoing, completed, cancelled, walkover');
            $table->integer('score_athlete1')->default(0);
            $table->integer('score_athlete2')->default(0);
            $table->string('result_details')->nullable()->comment('e.g., IPPON, HANSOKU, TIMEUP, KIKEN');

            $table->timestamps();
            $table->index(['competition_id', 'status'], 'fights_competition_status_index');
            $table->index(['category_id', 'round_number', 'match_number_in_round'], 'fights_category_round_match_index');
        });
    }
    public function down(): void {
        Schema::dropIfExists('fights');
    }
};