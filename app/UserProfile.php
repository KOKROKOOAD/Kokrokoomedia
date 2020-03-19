<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'client_id',
        'address',
        'company_name',
        'company_profile',
        'website',
        'industry_type',
        'policies',
        'phone2'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'client_id', 'client_id');
    }
}
