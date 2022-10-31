<?php

namespace App\DataObjects\User;

use App\DataObjects\BaseDataObject;
use App\DataObjects\DataObjectContract;

class RoleData  extends BaseDataObject implements DataObjectContract
{
    public $id;
    public $name;
    public $display_name;
    public $description;
    public $system;
    /**
     * @var array
     */
    public $permissions = [];
}
