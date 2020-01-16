<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintRateCard extends Model
{
    protected $fillable = [
       'rate_card_id','rate_card_title_id',
        'media_house_id','rate_card_data'
    ];
}
