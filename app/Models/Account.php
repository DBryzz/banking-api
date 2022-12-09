<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Double;

class Account extends Model
{
    use HasFactory;

    const TYPE_CURRENT = "current";
    const TYPE_SAVINGS = "savings";
    const STATUS_APPROVED = "approved";
    const STATUS_PENDING = "pending";
    const STATUS_BLOCKED = "blocked";

    protected $fillable = [
        'type',
        'account_number',
        'balance',
        'status',
        'user_id'
    ];

    public function addBalance(float $amount): ?bool
    {
        $balance = $this->getAttribute('balance');
        $newBalance = $balance + $amount;
        $this->setAttribute('balance', $newBalance);
        return true;
    }

    public function reduceBalance(float $amount): ?bool
    {
        $balance = $this->getAttribute('balance');
        if ($balance < $amount)
            return false;
        $newBalance = $balance - $amount;
        $this->setAttribute('balance', $newBalance);
        return true;
    }

    public function getBalance(): ?float
    {
        return $this->getAttribute('balance');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}