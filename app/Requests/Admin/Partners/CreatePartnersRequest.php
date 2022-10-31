<?php

namespace App\Requests\Admin\Partners;

use App\Requests\BaseRequest;

class CreatePartnersRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'status' => 'integer',

            'link' => 'string|required',


            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }
}
