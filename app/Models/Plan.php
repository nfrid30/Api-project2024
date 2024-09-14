<?php

namespace App\Models;

use App\Enums\PlanStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Collection\Collection;

/**
 * @property string name
 * @property float price
 * @property int publications
 * @property PlanStatusEnum status
 * @property int created_by
 * @property PlanUser pivot
 *
 * @property User|null createdBy
 * @property Collection users
 */

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'publications',
        'status',
        'created_by',

    ];

    public function casts(): array
    {
        return [
            'status' => PlanStatusEnum::class
        ];

    }


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');

    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, PlanUser::class)
            ->withPivot(['publications', 'created_at']);
    }

    public function planUsers(): HasMany
    {
        return $this->hasMany(PlanUser::class);
    }
}
