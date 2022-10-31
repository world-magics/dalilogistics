<?php

namespace App\Requests\Admin\Banner;

use App\Requests\BaseRequest;

class CreateBannerRequest extends BaseRequest
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
