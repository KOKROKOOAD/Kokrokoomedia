<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Mar 2020 09:15:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdminAuditTrail
 * 
 * @property int $id
 * @property string $action_by
 * @property string $activities
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AdminAuditTrail extends Eloquent
{
	protected $fillable = ['action_by', 'activities', 'action', 'request_ip', 'created_by'];
}
