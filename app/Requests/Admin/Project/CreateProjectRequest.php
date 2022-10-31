<?php

namespace App\Requests\Admin\Project;

use App\Requests\BaseRequest;

class CreateProjectRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'status' => 'integer',

            'title' => 'array|required',
            'title.*' => 'string|required',

            'short_info' => 'array|required',
            'short_info.*' => 'string|required',

            'content' => 'array|required',
            'content.*' => 'string|required',

            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }
}
