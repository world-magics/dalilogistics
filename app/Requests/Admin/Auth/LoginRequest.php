<?php
/**
 * Created by PhpStorm.
 * Filename: LoginRequest.php
 * Project Name: datlan
 * User: Akbarali
 * Date: 31/08/2021
 * Time: 5:36 PM
 * Github: https://github.com/akbarali1
 * Telegram: @kbarali
 * E-mail: akbarali@webschool.uz
 */

namespace App\Requests\Admin\Auth;

use App\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "username" => "required",
            "password" => "required",
        ];
    }
}
