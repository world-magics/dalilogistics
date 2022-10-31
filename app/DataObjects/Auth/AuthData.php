<?php

namespace App\DataObjects\Auth;

use App\DataObjects\BaseDataObject;
use App\DataObjects\DataObjectContract;

class AuthData extends BaseDataObject implements DataObjectContract
{
    public $username;
    public $password;
}
