<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property string $client_id
 * @property string $media_house_id
 * @property string $subscription_id
 * @property string $transaction_id
 * @property string $invoice_id
 * @property string $amount
 * @property string $transaction_status
 * @property string $response
 * @property string $payment_source
 * @property string $phone
 * @property string $service
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Transaction extends Eloquent
{
	protected $fillable = [
		'client_id',
		'media_house_id',
		'subscription_id',
		'transaction_id',
		'invoice_id',
		'amount',
		'transaction_status',
		'response',
		'payment_source',
		'phone',
		'service'
	];
}
