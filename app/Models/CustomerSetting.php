<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CustomerSetting
 * 
 * @property int $id
 * @property string $customer_id
 * @property string $sms_sender_id
 * @property string $sms_sender_username
 * @property string $sms_sender_password
 * @property int $bill_day
 * @property string $group
 * @property string $picture
 * @property string $receipt_prefix
 *
 * @package App\Models
 */
class CustomerSetting extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'bill_day' => 'int'
	];

	protected $hidden = [
		'sms_sender_password'
	];

	protected $fillable = [
		'customer_id',
		'sms_sender_id',
		'sms_sender_username',
		'sms_sender_password',
		'bill_day',
		'group',
		'picture',
		'receipt_prefix'
	];
}
