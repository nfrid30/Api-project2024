<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

class CommonAuthorizedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function validationData(): ?array
    {
        return $this->all() + $this->route()->parameters();
    }
}
