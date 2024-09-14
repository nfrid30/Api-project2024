<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\User;
use Illuminate\Validation\Rule;


class LoginRequest extends CommonAuthorizedRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', Rule::exists(User::class, 'email')],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
