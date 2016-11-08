<?php

/**
 * Created by PhpStorm.
 * User: Cleiton
 * Date: 07/11/2016
 * Time: 23:18
 */

namespace App\Factories;

use App\Entities\Menu;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\App;

class MenuFactorie
{

    public function insert(Array $data)
    {
        try
        {

            $data = array(
                array('idmenu' => '1', 'idparametroempresa' => $data['idempresa'], 'label' => 'Agenda', 'data' => '', 'tipopermissao' => 'V', 'alpha' => '0', 'campo' => 'menu_agenda', 'camposuperior' => null,
                    'visivel' => '1', 'imagemicone' => null, 'labelicone' => null, 'nomeview' => null, 'nivelmenu' => '1'),
                array('idmenu' => '2', 'idparametroempresa' => $data['idempresa'], 'label' => 'Agenda', 'data' => '', 'tipopermissao' => 'V', 'alpha' => '0', 'campo' => 'menu_agenda', 'camposuperior' => null,
                    'visivel' => '1', 'imagemicone' => null, 'labelicone' => null, 'nomeview' => null, 'nivelmenu' => '1')
            );

            return $data;
        }
        catch(ValidationException $exception)
        {
            return $exception;
        }
    }
}