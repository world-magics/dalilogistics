<?php

namespace App\Requests\Admin\User;

use App\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "id" => "required|integer",
            "display_name" => "required|max:255",
            "description" => "nullable",
            "permissions" => "array"
        ];
    }
}
