<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'competition_id', 
        'matches_played',
        'matches_won',
        'matches_lost',
        'matches_drawn', 
        'points_scored',
        'points_conceded',
        'last_calculated_at', 
    ];

    protected $casts = [
        'matches_played' => 'integer',
        'matches_won' => 'integer',
        'matches_lost' => 'integer',
        'matches_drawn' => 'integer',
        'points_scored' => 'integer',
        'points_conceded' => 'integer',
        'last_calculated_at' => 'datetime',
    ];

    /**
     * Get the user these statistics belong to.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Optional: Get the competition these stats relate to, if stats are per-competition.
     */
    // public function competition(): BelongsTo
    // {
    //    return $this->belongsTo(Competition::class);
    // }
}