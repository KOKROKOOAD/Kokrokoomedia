<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SpotsUsed
 * 
 * @property int $id
 * @property string $rate_card_id
 * @property string $spots_used
 * @property string $segments
 * @property string $segment_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class SpotsUsed extends Eloquent
{
	protected $fillable = [
		'rate_card_id',
		'spots_used',
		'segments',
		'segment_date'
	];
}
