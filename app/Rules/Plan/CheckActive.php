<?php

namespace App\Rules\Plan;

use App\Enums\PlanStatusEnum;
use App\Models\Plan;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class CheckActive implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /* @var Plan $value */
        if ($value->status !== PlanStatusEnum::ACTIVE) {
            $fail("This plan is Inactive.");
        }
    }
}
