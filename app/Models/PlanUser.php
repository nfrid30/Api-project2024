<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property int plan_id
 * @property int publications
 * @property Carbon|null created_at
 *
 */

class PlanUser extends Model
{
    use HasFactory;

    protected $table = 'plan_user';

    protected $fillable = [
        'plan_id',
        'user_id',
        'publications',
    ];


}
