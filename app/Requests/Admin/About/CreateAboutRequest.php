<?php

namespace App\Requests\Admin\About;

use App\Requests\BaseRequest;

class CreateAboutRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'status' => 'integer',

            'title' => 'array|required',
            'title.*' => 'string|required',

            'info' => 'array|required',
            'info.*' => 'string|required',
        ];
    }
}
