<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-7
 * Time: 下午10:18
 */

namespace common\helper;


class DateHelp
{
    static function formatHumanTime($sec)
    {
        $str = '';
        if ($sec > 3600) {
            $hour = floor($sec / 3600);
            $str .= "$hour 小时";
            $sec -= $hour * 3600;
        }

        if ($sec > 60) {
            $min = floor($sec / 60);
            $str .= "$min 分钟";
            $sec -= $min * 60;
        }
        return $str .= "$sec 秒";
    }

}