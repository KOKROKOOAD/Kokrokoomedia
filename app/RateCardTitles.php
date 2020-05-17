<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateCardTitles extends Model
{
    protected $fillable = [
        'media_house_id',
        'rate_card_title',
        'rate_card_title_id',
        'client_id'
    ];


    protected  $primaryKey = 'rate_card_title_id';
    protected $keyType = 'string';
    public $incrementing = false;
}
