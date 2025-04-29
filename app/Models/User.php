<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'state',
        'grade',
        'age',
        'club_id',
        'role',
        'status'
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isReferee()
    {
        return $this->role === 'referee';
    }

    public function isAthlete()
    {
        return $this->role === 'athlete';
    }

    public function isActive() { return $this->status === 'active'; }
    public function isPending() { return $this->status === 'pending'; }
    public function isSuspended() { return $this->status === 'suspended'; }
    // public function club() {
    //     return $this->belongsTo(Club::class);
    // }
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
