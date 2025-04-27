<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'location',
        'description',
        'status', // e.g., 'scheduled', 'ongoing', 'completed', 'cancelled'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get the categories for this competition.
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

     /**
     * Get all matches for this competition (through categories).
     */
    // public function matches(): HasMany // Or HasManyThrough if needed
    // {
    //     // Simple approach if Match has competition_id
    //     return $this->hasMany(Match::class);
    //     // Or via categories: return $this->hasManyThrough(Match::class, Category::class);
    // }
}