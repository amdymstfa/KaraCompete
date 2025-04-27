<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class GlobalStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id',
        'total_athletes',
        'total_matches_scheduled',
        'total_matches_completed',
        'total_points_scored',
        'calculation_date',
    ];

    protected $casts = [
        'total_athletes' => 'integer',
        'total_matches_scheduled' => 'integer',
        'total_matches_completed' => 'integer',
        'total_points_scored' => 'integer',
        'calculation_date' => 'datetime',
    ];

     /**
     * Optional: Get the competition these stats relate to, if not truly global.
     */
    // public function competition(): BelongsTo
    // {
    //    return $this->belongsTo(Competition::class);
    // }
}