<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KokrokooAdmin
 * 
 * @property int $id
 * @property string $admin_id
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $phone
 * @property string $role
 * @property string $status
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $last_login
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class KokrokooAdmin extends Eloquent
{
	protected $dates = [
		'last_login'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'admin_id',
		'name',
		'email',
		'title',
		'phone',
		'role',
		'status',
		'password',
		'remember_token',
		'last_login'
	];
}
