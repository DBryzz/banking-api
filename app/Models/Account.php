<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const CURRENT_ACCOUNT = 'current';
    const SAVINGS_ACCOUNT = 'savings';

    protected $fillable = [
        'type',
        'account_number',
        'balance'
    ];

    // strtoupper(bin2hex(random_bytes(5)))


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}