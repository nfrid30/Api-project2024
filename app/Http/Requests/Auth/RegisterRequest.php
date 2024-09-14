<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterRequest extends CommonAuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'name' => ['required', 'string',],
            'email' => ['required', 'string', 'email', Rule::unique(User::class, 'email')],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
