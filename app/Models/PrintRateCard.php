<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PrintRateCard
 * 
 * @property int $id
 * @property string $rate_card_id
 * @property string $rate_card_title_id
 * @property string $media_house_id
 * @property string $rate_card_data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class PrintRateCard extends Eloquent
{
	protected $fillable = [
		'rate_card_id',
		'rate_card_title_id',
		'media_house_id',
		'rate_card_data'
	];
}
