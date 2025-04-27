<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Referee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certification_level', // Example: 'National A', 'Regional B'
        // 'grade' // Could be here if different from User's grade
    ];

    /**
     * Get the user account associated with the referee.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the matches assigned to this referee.
     * Assumes a pivot table 'match_referee'.
     */
    // public function assignedMatches(): BelongsToMany
    // {
    //     return $this->belongsToMany(Match::class, 'match_referee') // Pivot table name
    //                 ->withTimestamps() // Optional: track assignment time
    //                 ->withPivot('role'); // Example: 'main_referee', 'assistant', 'timer'
    // }
}