<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function client()
    {
        return $this->hasMany('App\Client', 'user_id');
    }


    public function avatar()
    {
        return $this->hasOne('App\Models\Avatar');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }


}
