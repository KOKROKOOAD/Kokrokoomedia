<?php

namespace App;

use App\Models\Avatar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
   

    protected $guard = 'admin';
    //
    //    public function role(){
    //        return $this->hasOne('App\Roles');
    //    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone1', 'title', 'isActive', 'role', 'password', 'logo','created_by','account_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'users';


    public function avatar()
    {
        return $this->belongsTo(Avatar::class, 'client_id', 'client_id');
    }
}
