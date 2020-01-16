<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 09 Feb 2019 14:37:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ScheduledAd
 * 
 * @property int $id
 * @property string $subscription_id
 * @property string $client_id
 * @property string $media_house_id
 * @property string $rate_card_id
 * @property string $title
 * @property string $start
 * @property string $end
 * @property string $status
 * @property array $created_ad_data
 * @property string $file_name
 * @property string $file_type
 * @property string $file_path
 * @property string $file_size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ScheduledAd extends Eloquent
{
	protected $casts = [
		'created_ad_data' => 'json'
	];

    protected $primaryKey = 'subscription_id';
    protected $keyType = 'string';
    public $incrementing = false;

	protected $fillable = [
		'subscription_id',
		'client_id',
		'media_house_id',
		'rate_card_id',
		'title',
		'start',
		'end',
		'status',
		'created_ad_data',
		'file_name',
		'file_type',
		'file_path',
		'file_size'
	];
}
