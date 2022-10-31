<?php

namespace App\Requests\Admin\Role;

use App\Requests\BaseRequest;

class UpdateRoleRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'permissions' => 'required|array',
        ];
    }
}
