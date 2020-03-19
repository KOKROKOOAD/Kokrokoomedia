<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RateCard
 * 
 * @property int $id
 * @property string $rate_card_id
 * @property string $rate_card_title_id
 * @property string $media_house_id
 * @property string $days_of_week
 * @property array $segments
 * @property string $days_of_weekend
 * @property array $weekend_segments
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class RateCard extends Eloquent
{
	protected $casts = [
		'segments' => 'json',
		'weekend_segments' => 'json'
	];

	protected $fillable = [
		'rate_card_id',
		'rate_card_title_id',
		'media_house_id',
		'days_of_week',
		'segments',
		'days_of_weekend',
		'weekend_segments'
	];
}
