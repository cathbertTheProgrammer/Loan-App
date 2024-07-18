<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    /**
     * Check if the user has admin privileges.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function verifiedLoans()
    {
        return $this->hasMany(LoanStatuses::class, 'verified_by');
    }

    public function recommendedLoans()
    {
        return $this->hasMany(LoanStatuses::class, 'recommended_by');
    }

    public function approvedLoans()
    {
        return $this->hasMany(LoanStatuses::class, 'approved_by');
    }
}
