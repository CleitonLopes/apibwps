<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 08/11/2016
 * Time: 09:57
 */

namespace App\Services;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Exceptions\ValidatorException;

class SetDatabase
{
    public static function setDatabase($host, $dbname, $user, $pass)
    {
        try
        {
            Config(['database.connections.mysql.host' => $host]);
            Config(['database.connections.mysql.database' => $dbname]);
            Config(['database.connections.mysql.username' => $user]);
            Config(['database.connections.mysql.password' => $pass]);

        }
        catch(ValidatorException $exetption)
        {
            throw $exetption;
        }
    }

    public static function setMenuDatabase()
    {
        try
        {
            Config(['database.connections.mysql-flex-admin.host' => 'localhost']);
            Config(['database.connections.mysql-flex-admin.database' => 'flexadminteste']);
            Config(['database.connections.mysql-flex-admin.username' => 'root']);
            Config(['database.connections.mysql-flex-admin.password' => '']);

        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }
}