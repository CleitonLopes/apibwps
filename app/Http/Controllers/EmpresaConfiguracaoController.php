<?php

namespace App\Http\Controllers;


use App\Services\EmpresaConfiguracaoService;
use App\Transformers\EmpresaConfiguracaoTransformer;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class EmpresaConfiguracaoController extends Controller
{
    /**
     * @var EmpresaConfiguracaoService
     */
    private $empresaConfiguracaoService;
    /**
     * @var Response
     */
    private $response;

    public function __construct(EmpresaConfiguracaoService $empresaConfiguracaoService, Response $response)
    {

        $this->empresaConfiguracaoService = $empresaConfiguracaoService;
        $this->response = $response;
    }

    /**
     * @param Request $request
     * @return int
     * @throws ValidatorException
     */
    public function create(Request $request)
    {
        try
        {
            $empresaconfiguracao = $this->empresaConfiguracaoService->create($request->all());

            if($empresaconfiguracao)
            {
                return $this->response->getStatusCode();
            }
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }
}
