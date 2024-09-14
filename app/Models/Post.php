<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string text
 * @property int user_id
 * @property PostStatusEnum status
 */

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'status',
        'user_id',
    ];

    public function casts(): array
    {
        return [
            'status' => PostStatusEnum::class,
        ];
    }
}
