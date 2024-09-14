<?php

namespace App\Http\Requests\Api\Post;

use App\Http\Requests\Common\CommonAuthorizedRequest;

class StorePostRequest extends CommonAuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'min:5',
                'max:50',
                'string'
            ],
            'text' => [
                'required',
                'min:5',
                'max:5000',
                'string'
            ],
            'userId' => ['int']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'userId' => auth()->id(),
        ]);
    }
}
