<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateCards extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User', 'client_id', 'client_id');
    }


    protected $casts =  ['segments'=> 'array', 'weekend_segments'=> 'array','days_of_week'=> 'array'];

    protected $fillable = [
        'media_house_id',
        'rate_card_title_id',
        'segments',
        'weekend_segments',
        'rate_card_id',
        'days_of_week',
        'days_of_weekend'
    ];
}
