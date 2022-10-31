<?php

namespace App\DataObjects\User;

use App\DataObjects\BaseDataObject;
use App\DataObjects\DataObjectContract;

class CreateRoleData  extends BaseDataObject implements DataObjectContract
{
    public $name;
    /**
     * @var array
     */
    public $permissions = [];
}
