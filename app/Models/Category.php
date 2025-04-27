<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id',
        'name', // e.g., "Cadet Male Kumite -60kg"
        'min_age',
        'max_age',
        'sex', // 'male', 'female', 'mixed'
        'min_weight',
        'max_weight',
        'min_grade', // Grade range
        'max_grade',
        'type', // 'kumite', 'kata'
    ];

    protected $casts = [
        'min_weight' => 'decimal:2',
        'max_weight' => 'decimal:2',
        'min_age' => 'integer',
        'max_age' => 'integer',
    ];

    /**
     * Get the competition this category belongs to.
     */
    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    /**
     * Get the athletes registered in this category.
     * Assumes a pivot table 'athlete_category'.
     */
    public function athletes(): BelongsToMany
    {
        return $this->belongsToMany(Athlete::class, 'athlete_category')
                    ->withTimestamps()
                    ->withPivot('weight_at_registration');
    }

    /**
     * Get the matches within this category.
     */
    // public function matches(): HasMany
    // {
    //     return $this->hasMany(Match::class);
    // }
}