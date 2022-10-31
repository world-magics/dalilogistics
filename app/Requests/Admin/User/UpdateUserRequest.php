<?php

namespace App\Requests\Admin\User;

use App\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "name" => "required|max:255",
//            "status" => "nullable",
            "roles" => "required|array",
            "email" => "required",
            "username" => [
                "required",
                Rule::unique('users')->ignore(request('id')) //->whereNull('deleted_at'),
            ],
            "password" => "nullable|confirmed",
        ];
    }
}
