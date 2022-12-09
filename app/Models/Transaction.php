<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const TYPE_DEPOSIT = "deposit";
    const TYPE_WITHDRAWAL = "withdrawal";
    const TYPE_TRANSFER = "transfer";
    const STATUS_SUCCESS = "succeeded";
    const STATUS_FAIL = "failed";

    protected $fillable = [
        'type',
        'account',
        'amount',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}