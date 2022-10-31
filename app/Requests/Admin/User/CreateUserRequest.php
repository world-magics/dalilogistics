<?php

namespace App\Requests\Admin\User;

use App\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "name" => "required|max:255",
//            "phone_numbers" => "nullable|max:16",
//            "status" => "nullable",
            "roles" => "required|array",
            "email" => "required",
            "username" => [
                "required",
                Rule::unique('users')//->whereNull('deleted_at'),
            ],
            "password" => "required|confirmed",
        ];
    }
}
