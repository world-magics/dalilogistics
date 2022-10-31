<?php

namespace App\DataObjects;

use App\Requests\BaseRequest;

interface DataObjectContract
{
    public static function createFromRequest(BaseRequest $request);
}
