<?php

namespace App\Requests\Admin\Kachestva;

use App\Requests\BaseRequest;

class EditKachestvaRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'status' => 'integer',

            'title' => 'array|required',
            'title.*' => 'string|required',

            // 'content' => 'array|required',
            // 'content.*' => 'string|required',

            'imgurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
