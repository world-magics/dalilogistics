<?php

namespace App\Results;

/**
 * Created by PhpStorm.
 * Filename: CommonRegionsResult.php
 * Project Name: cargo.loc
 * User: Akbarali
 * Date: 27/09/2021
 * Time: 10:02 AM
 * Github: https://github.com/akbarali1
 * Telegram: @kbarali
 * E-mail: akbarali@webschool.uz
 */
class CommonRegionsResult extends BaseResult implements ResultContract
{
    public $regions;

    public function __construct($regions)
    {
        parent::__construct(['regions' => $regions]);
    }
}
