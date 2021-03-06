<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 May 2020 14:16:55 +0000.
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
 * @property string $events
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
		'events'
	];
}
