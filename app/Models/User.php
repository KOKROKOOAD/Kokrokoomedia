<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $client_id
 * @property string $name
 * @property string $title
 * @property string $email
 * @property string $phone1
 * @property string $phone2
 * @property string $address
 * @property string $media
 * @property string $media_house
 * @property string $website
 * @property string $company_profile
 * @property string $company_name
 * @property string $industry_type
 * @property string $policies
 * @property string $role
 * @property string $isActive
 * @property string $created_by
 * @property string $created_by_id
 * @property string $last_login
 * @property string $account_type
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $logo
 *
 * @package App\Models
 */
class User extends Eloquent
{
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
		'media',
		'media_house',
		'website',
		'company_profile',
		'company_name',
		'industry_type',
		'policies',
		'role',
		'isActive',
		'created_by',
		'created_by_id',
		'last_login',
		'account_type',
		'password',
		'remember_token',
		'logo'
	];

	
}
