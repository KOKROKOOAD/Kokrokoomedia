<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 May 2020 14:16:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdminAuditTrail
 * 
 * @property int $id
 * @property string $action_by
 * @property string $action
 * @property string $request_ip
 * @property string $activities
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AdminAuditTrail extends Eloquent
{
	protected $fillable = [
		'action_by',
		'action',
		'request_ip',
		'activities'
	];
}
