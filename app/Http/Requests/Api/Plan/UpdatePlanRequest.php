<?php

namespace App\Http\Requests\Api\Plan;

use App\Enums\PlanStatusEnum;
use App\Http\Requests\Common\CommonAuthorizedRequest;
use Illuminate\Validation\Rules\Enum;

class UpdatePlanRequest extends CommonAuthorizedRequest
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
            'status' => ['nullable', 'int', new Enum(PlanStatusEnum::class)],
            'createdBy' => ['int']
        ];
    }

    protected function prepareForValidation(): void
    {
        if (isset($this->status)) {
            $this->merge([
                'status' => PlanStatusEnum::valueFormName($this->status),
                'createdBy' => auth()->id(),
            ]);
        }
    }
}
