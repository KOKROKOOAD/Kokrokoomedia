<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function  user()
    {
        return $this->belongsTo(App\User::class, 'media_house_id', 'client_id');
    }
}
