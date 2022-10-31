<?php

namespace App\Requests\Admin\News;

use App\Requests\BaseRequest;

class CreateNewsRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'status' => 'integer',

            'title' => 'array|required',
            'title.*' => 'string|required',

            'info' => 'array|required',
            'info.*' => 'string|required',

            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }
}
