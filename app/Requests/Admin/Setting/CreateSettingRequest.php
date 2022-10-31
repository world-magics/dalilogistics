<?php

namespace App\Requests\Admin\Setting;

use App\Requests\BaseRequest;

class CreateSettingRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'key' => 'string',

            'value' => 'array|required',
            'value.*' => 'string|required',

        ];
    }
}
