<?php

namespace App\Http\DTO\Plan;

use App\Http\DTO\CommonData;

readonly class PlanData extends CommonData
{
    public function __construct(
        public string $name,
        public float $price,
        public int $publications,
        public int|null $createdBy = null,
        public null|int $status = null,
    )
    {

    }
}
