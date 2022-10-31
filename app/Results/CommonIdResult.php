<?php

namespace App\Results;

class CommonIdResult extends BaseResult implements ResultContract
{
    public $id;

    public function __construct($id)
    {
        parent::__construct(['id' => $id]);
    }
}
