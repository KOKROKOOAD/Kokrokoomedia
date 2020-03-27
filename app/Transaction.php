<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'amount',
        'client_id',
        'media_house_id',
        'subscription_id',
        'transaction_id',
        'invoice_id',
        'transaction_status',
        'response',
        'payment_source',
        'phone',
        'service'
    ];

    public function  user()
    {
        return $this->belongsTo(App\User::class, 'media_house_id', 'client_id');
    }
}
