<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fights extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'competition_id',
        'athlete1_id',
        'athlete2_id', 
        'winner_id',   
        'round_number',
        'match_number_in_round', 
        'scheduled_time',
        'tatami_number', 
        'status', 
        'score_athlete1',
        'score_athlete2',
        'result_details', 
    ];

    protected $casts = [
        'scheduled_time' => 'datetime',
        'score_athlete1' => 'integer',
        'score_athlete2' => 'integer',
        'round_number' => 'integer',
        'match_number_in_round' => 'integer',
    ];

    /**
     * Get the category this match belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the competition this match belongs to.
     */
    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    /**
     * Get the first athlete participant.
     */
    public function athlete1(): BelongsTo
    {
        return $this->belongsTo(Athlete::class, 'athlete1_id');
    }

    /**
     * Get the second athlete participant (can be null).
     */
    public function athlete2(): BelongsTo
    {
        return $this->belongsTo(Athlete::class, 'athlete2_id');
    }

    /**
     * Get the winner of the match (can be null).
     */
    public function winner(): BelongsTo
    {
        return $this->belongsTo(Athlete::class, 'winner_id');
    }

     /**
     * Get the referees assigned to this match.
     * Assumes a pivot table 'match_referee'.
     */
    public function referees(): BelongsToMany
    {
        return $this->belongsToMany(Referee::class, 'match_referee')
                     ->withTimestamps()
                     ->withPivot('role');
    }
}
