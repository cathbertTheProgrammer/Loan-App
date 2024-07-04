<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanStatuses extends Model
{
    use HasFactory;

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function recommendedBy()
    {
        return $this->belongsTo(User::class, 'recommended_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
