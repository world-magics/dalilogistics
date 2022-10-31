<?php

namespace App\DataObjects\User;

use App\DataObjects\BaseDataObject;
use App\DataObjects\DataObjectContract;

class UserData extends BaseDataObject implements DataObjectContract
{
    public $id;
    public $name;
    public $email;
    public $status = 1;
    /**
     * @var array
     */
    public $roles;
    public $username;
    public $password;
}
