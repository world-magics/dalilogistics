<?php

namespace App\Requests\Admin\Role;

use App\Requests\BaseRequest;

class CreateRoleRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'string|required',
            'permissions' => 'required|array',
        ];
    }
}
