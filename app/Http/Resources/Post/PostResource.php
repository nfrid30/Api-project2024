<?php

namespace App\Http\Resources\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Post
 */

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->getKey(),
            'title' => $this->title,
            'text' =>$this->text,
            'status' =>$this->status->name(),
        ];
    }
}
