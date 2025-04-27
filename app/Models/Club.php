<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
    ];

    /**
     * Get the users associated with the club.
     * Assumes you add a 'club_id' foreign key to the users table.
     */
    public function users(): HasMany
    {
        // This requires adding 'club_id' to the users table and removing the 'club' string field
        return $this->hasMany(User::class);
    }

    /**
     * Get the athletes associated with the club (alternative if Athlete model stores club_id).
     */
    // public function athletes(): HasMany
    // {
    //    return $this->hasMany(Athlete::class);
    // }
}