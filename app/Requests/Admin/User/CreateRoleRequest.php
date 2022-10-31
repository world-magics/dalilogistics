<?php

namespace App\Requests\Admin\User;

use App\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class CreateRoleRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "name" => "required|max:255|unique:roles,name",
            "display_name" => "required|max:255",
            "description" => "nullable",
            "permissions" => "array"
        ];
    }
}
