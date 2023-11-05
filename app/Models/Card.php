<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_number',
        'price',
        'transport',
        
        'type',
        'user_id',
        'city_id',
        'type_id',
        'transport_id',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function city()
{
    return $this->belongsTo(City::class, 'city_id');
}

public function type()
{
    return $this->belongsTo(Type::class, 'type_id');
}

public function transport()
{
    return $this->belongsTo(Transport::class, 'transport_id');
}


    public function creditOperations()
    {
        return $this->hasMany(CreditHistory::class, 'card_id');
    }

    public function debitOperations()
    {
        return $this->hasMany(DebitHistory::class, 'card_id');
    }

}
