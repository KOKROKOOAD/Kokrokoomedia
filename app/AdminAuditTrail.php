<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminAuditTrail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'activities', 'action', 'request_ip',];
}
