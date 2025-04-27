<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompetitionRegistration extends Pivot
{
    protected $table = 'competition_registrations';

    protected $fillable = [
        'competition_id',
        'user_id',
        'category_id',
        'status',
        'weight_measured',
        'participant_number',
    ];

     protected $casts = [
         'weight_measured' => 'decimal:2',
     ];

 
}