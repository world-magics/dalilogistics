<?php
/**
 * Created by PhpStorm.
 * Filename: JsonReturnViewModel.php
 * User: Akbarali
 * Github: https://github.com/akbarali1
 * Telegram: @kbarali
 * E-mail: akbarali@webschool.uz
 */

namespace App\ViewModels;

class JsonReturnViewModel
{
    public static function toJsonBeautify($data = [], $status = 200)
    {
        return response()->json($data, $status,
            [
                'Content-Type' => 'application/json',
                'Charset' => 'UTF-8'
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
