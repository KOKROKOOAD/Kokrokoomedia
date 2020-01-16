<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 09 Feb 2019 14:34:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MyEvent
 * 
 * @property int $id
 * @property string $title
 * @property string $start
 * @property string $end
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class MyEvent extends Eloquent
{
	protected $fillable = [
		'title',
		'start',
		'end',
		'description'
	];
}
