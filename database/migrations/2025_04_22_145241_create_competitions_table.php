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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();

            //restricts admin deletion if linked
            $table->foreignId('organizer_id')
                  ->constrained('users')
                  ->onDelete('restrict');

            // Target bracket size for categories within this competition
            $table->unsignedSmallInteger('bracket_size')
                  ->default(16)
                  ->comment('Target/Max bracket size (e.g., 16, 32, 64)');

            // Competition status
            $table->string('status')
                  ->default('scheduled')
                  ->index()
                  ->comment('e.g., scheduled, ongoing, completed, cancelled');

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};