<?php

namespace App\Http\Requests\Api\PlanUser;

use App\Enums\PlanStatusEnum;
use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\Plan;
use App\Rules\Plan\CheckActive;
use Illuminate\Validation\Rule;

class StorePlanUserRequest extends CommonAuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'plan' =>[
                'required',
                new CheckActive()
            ]
        ];
    }


}
