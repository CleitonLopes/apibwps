<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 08/11/2016
 * Time: 09:57
 */

namespace App\Services;


class SetDatabase
{
    public static function setDatabase($host, $dbname, $user, $pass)
    {
        try
        {
            config(['database.connections.mysql.host' => $host]);
            config(['database.connections.mysql.database' => $dbname]);
            config(['database.connections.mysql.username' => $user]);
            config(['database.connections.mysql.password' => $pass]);


        }
        catch(ValidatorException $exetption)
        {
            throw $exetption;
        }
    }
}