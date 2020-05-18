<?php

namespace App;

use App\Models\ScheduledAd;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Avatar;

class User extends Authenticatable
{

    use Notifiable;

    protected $primaryKey = 'client_id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'email',
        'phone1',
        'role',
        'isActive',
        'last_login',
        'company_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function scheduledAds()
    {
        return  $this->hasMany(ScheduledAd::class, 'media_house_id', 'client_id');
    }


    public  function segmentTitle()
    {
        return $this->hasMany('App\Models\ProgramTitle', 'client_id', 'client_id');
    }



    public  function transaction()
    {
        return  $this->hasMany(Transaction::class, 'media_house_id', 'client_id');
    }



    public function invoice()
    {
        return $this->hasMany(Invoices::class, 'client_id', 'client_id');
    }


    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
