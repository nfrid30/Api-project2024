<?php

namespace App\Http\DTO\Post;

use App\Http\DTO\CommonData;

readonly class PostData extends CommonData
{

    public function __construct(
        public string $title,
        public string $text,
        public int $userId,
    ) {

    }
}
