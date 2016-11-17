<?php

namespace App\Http\Controllers;

use App\Services\ParametroEmpresaService;
use App\Transformers\ParametroEmpresaTransformer;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ParametroEmpresaController extends Controller
{


    /**
     * @var ParametroEmpresaService
     */
    private $parametroEmpresaService;
    /**
     * @var Response
     */
    private $response;

    public function __construct(ParametroEmpresaService $parametroEmpresaService, Response $response)
    {
        $this->parametroEmpresaService = $parametroEmpresaService;
        $this->response = $response;
    }

    public function find()
    {
        try
        {
            $parametroempresa = $this->parametroEmpresaService->findMax();
            return $parametroempresa;

        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }

    public function create(Request $request)
    {
        try
        {
            $dadosConexao = $this->parametroEmpresaService->create($request->all());
            return $this->response->withItem($dadosConexao, new ParametroEmpresaTransformer());

        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }
}
