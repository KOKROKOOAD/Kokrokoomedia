<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $id
 * @property string $message
 * @property string $recipient
 * @property string $trans_id
 * @property string $status
 * @property string $method
 * @property string $customer_id
 * @property \Carbon\Carbon $time
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'message',
		'recipient',
		'trans_id',
		'status',
		'method',
		'customer_id',
		'time'
	];
}
