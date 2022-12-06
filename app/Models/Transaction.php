<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const DEPOSIT = "current";
    const WITHDRAWAL = "withdrawal";
    const TRANSFER = "transfer";

    protected $fillable = [
        'type',
        'account',
        'amount'
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}