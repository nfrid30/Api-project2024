<?php

namespace App\Http\Requests\Api\Plan;

use App\Enums\PlanStatusEnum;
use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\Plan;

class StorePlanRequest extends CommonAuthorizedRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'publications' => ['required', 'int', 'min:1'],
            'status' => ['int'],
            'createdBy' => ['int'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => PlanStatusEnum::INACTIVE->value,
            'createdBy' => auth()->id(),
        ]);
    }
}
