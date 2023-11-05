<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitHistory extends Model
{
    use HasFactory;

    protected $table = 'debit_history';

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
