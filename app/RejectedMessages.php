<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectedMessages extends Model
{
    protected $fillable = ['subscription_id','created_by','message'];
}