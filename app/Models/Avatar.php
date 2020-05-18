<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 May 2020 14:16:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Avatar
 * 
 * @property int $id
 * @property string $logo
 * @property string $file_path
 * @property string $file_size
 * @property string $client_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Avatar extends Eloquent
{
	protected $fillable = [
		'logo',
		'file_path',
		'file_size',
		'company_id'
	];
}
