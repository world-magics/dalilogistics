<?php

namespace App\Requests\Admin;

use App\Requests\BaseRequest;

class AdminLoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "username" => "required",
            "password" => "required",
        ];
    }
}
