<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use App\User;
use App\Admin;

/**
 * Class Avatar
 * 
 * @property int $id
 * @property string $client_id
 * @property string $logo
 * @property string $file_path
 * @property string $file_size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Avatar extends Eloquent
{
	protected $fillable = [
		'client_id',
		'logo',
		'file_path',
		'file_size'
	];

	public function user()
	{
		return $this->hasMany(User::class, 'client_id', 'client_id');
	}

	public function user2()
	{
		return $this->hasMany(User::class, 'created_by', 'created_by');
	}

	
}
