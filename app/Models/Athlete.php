<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Athlete extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'weight',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
    ];

    /**
     * Get the user account associated with the athlete.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the categories the athlete is registered for.
     * Assumes a pivot table 'athlete_category' or 'registrations'.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'athlete_category') 
                    ->withTimestamps() 
                    ->withPivot('weight_at_registration'); 
    }

    /**
     * Get the matches where this athlete is participant 1.
     */
    // public function matchesAsAthlete1(): HasMany
    // {
    //     return $this->hasMany(Match::class, 'athlete1_id');
    // }

    /**
     * Get the matches where this athlete is participant 2.
     */
    // public function matchesAsAthlete2(): HasMany
    // {
    //     return $this->hasMany(Match::class, 'athlete2_id');
    // }

    /**
     * Get the matches won by this athlete.
     */
    // public function wonMatches(): HasMany
    // {
    //     return $this->hasMany(Match::class, 'winner_id');
    // }
}