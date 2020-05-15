<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 May 2020 14:16:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdSegment
 * 
 * @property int $id
 * @property string $client_id
 * @property string $segments
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AdSegment extends Eloquent
{
	protected $fillable = [
		'client_id',
		'segments'
	];
}
