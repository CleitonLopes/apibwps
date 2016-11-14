<?php

/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 14/11/2016
 * Time: 16:28
 */

namespace App\Services\Utils;

class Funcoes
{
    public static function trataSql($file)
    {
        $sql = explode(';', $file);

        $sql = preg_replace('/\s/',' ',$sql);

        return $sql;
    }

    public static function trataSqlCest($file)
    {
        $sql = explode(';xy', $file);

        $sql = preg_replace('/\s/',' ',$sql);

        return $sql;
    }
}