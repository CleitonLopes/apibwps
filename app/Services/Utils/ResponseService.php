<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 25/11/2016
 * Time: 17:30
 */

namespace App\Services\Utils;


use EllipseSynergie\ApiResponse\Laravel\Response;


class ResponseService extends Response
{

    public static function createResponse($responseCode, $data)
    {
        $response = response(['result' => $data], $responseCode, []);
        $response->header('Content-Type', 'application/json; charset=UTF-8');
        $response->header('charset', 'utf-8');
        return $response;
    }
}