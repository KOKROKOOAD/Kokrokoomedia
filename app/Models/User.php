<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Jul 2018 07:59:43 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $client_id
 * @property string $email
 * @property string $phone1
 * @property string $phone2
 * @property string $address
 * @property string $website
 * @property string $company_profile
 * @property string $company_name
 * @property string $industry_type
 * @property string $policies
 * @property string $logo
 * @property string $role
 * @property bool $is_admin
 * @property bool $isActive
 * @property string $activation_code
 * @property string $last_login
 * @property string $account_type
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class User extends Eloquent
{
    use Notifiable;

    public function ads(){
        return $this->hasMany('App\Models\Ad');
    }
	protected $casts = [
		'isActive' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
	    'client_id',
		'name',
		'title',
		'email',
		'phone1',
		'phone2',
		'address',
		'website',
		'company_profile',
		'company_name',
		'industry_type',
		'policies',
		'logo',
		'role',
        'is_admin',
		'isActive',
		'activation_code',
		'last_login',
		'account_type',
		'password',
		'remember_token'
	];
}
