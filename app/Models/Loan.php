<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public function assets()
    {
        return $this->belongsToMany(Asset::class, 'loan_asset');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loanStatuses()
    {
        return $this->hasMany(LoanStatuses::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
