<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditHistory extends Model
{
    use HasFactory;

    protected $table = 'credit_history';

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
