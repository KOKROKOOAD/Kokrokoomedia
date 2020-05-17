<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property array $segments
 * @property string $spots
 * @property string $rate
 * @property string $durations
 * @property string $payment_status
 * @property string $file_name
 * @property string $rate_card_title
 * @property string $media_house
 * @property string $file_type
 * @property string $file_path
 * @property string $file_size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted
 * @property string $deleted_at
 *
 * @package App\Models
 */
class ScheduledAd extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'segments' => 'json'
	];

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'subscription_id',
		'client_id',
		'media_house_id',
		'rate_card_id',
		'title',
		'start',
		'end',
		'status',
		'segments',
		'spots',
		'rate',
		'durations',
		'payment_status',
		'file_name',
		'rate_card_title',
		'media_house',
		'file_type',
		'file_path',
		'file_size',
		'deleted'
	];


	public function user()
	{
		return  BelongsTo(App\user::class, 'client_id', 'client_id');
	}
}
