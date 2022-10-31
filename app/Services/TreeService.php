<?php

namespace App\Services;

class TreeService
{
    public static function out_options($array, $selected_id = 0, $level = 0)
    {
        $level++;
        $out = '';
        foreach ($array as $i => $row) {
            $out .= '<option value="' . $row['id'] . '"';
            if ($row['id'] == $selected_id) {
                $out .= ' selected';
            }
            $out .= '>';

            if ($level > 1) {
                $out .= str_repeat('&emsp;', $level - 1);
            }
            $out .= $row['title']['ru'] . '</option>';

            if (!empty($row['children'])) {
                $out .= self::out_options($row['children'], $selected_id, $level);
            }
        }
        return $out;
    }


}
