<?php

namespace App\Results;

/**
 * Created by PhpStorm.
 * Filename: CommonDeliveryResult.php
 * Project Name: cargo.loc
 * User: Akbarali
 * Date: 01/10/2021
 * Time: 12:52 PM
 * Github: https://github.com/akbarali1
 * Telegram: @kbarali
 * E-mail: akbarali@webschool.uz
 */
class CommonDeliveryResult extends BaseResult implements ResultContract
{
    public $delivery_id;

    public function __construct($delivery_id)
    {
        parent::__construct(['delivery_id' => $delivery_id]);
    }
}
