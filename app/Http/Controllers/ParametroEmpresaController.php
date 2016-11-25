<?php

namespace App\Http\Controllers;

use App\Services\ParametroEmpresaService;
use App\Services\Utils\ResponseService;
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
    private $responseService;

    public function __construct(ParametroEmpresaService $parametroEmpresaService, ResponseService $responseService)
    {
        $this->parametroEmpresaService = $parametroEmpresaService;
        $this->responseService = $responseService;
    }

    /**
     * @return Array idempresa, idparamentroempresa
     * @throws ValidatorException
     */
    public function find()
    {
        try
        {
            $parametroempresa = $this->parametroEmpresaService->find();
            return $this->responseService->withCollection($parametroempresa, new ParametroEmpresaTransformer());

        }
        catch(ValidatorException $exception)
        {
            throw $this->responseService->errorWrongArgs($exception->getMessageBag());
        }
    }

    /**
     * @param Request $request
     * @return object item com dados criados
     * @throws ValidatorException
     */
    public function create(Request $request)
    {
        try
        {
            $dadosConexao = $this->parametroEmpresaService->create($request->all());
            return $this->responseService->withItem($dadosConexao, new ParametroEmpresaTransformer());

        }
        catch(ValidatorException $exception)
        {
            throw $this->responseService->errorWrongArgs($exception->getMessageBag());
        }
    }
}
