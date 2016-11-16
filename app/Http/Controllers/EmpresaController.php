<?php

namespace App\Http\Controllers;

use App\Services\EmpresaService;
use App\Transformers\EmpresaTransformer;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class EmpresaController extends Controller
{
    /**
     * @var EmpresaService
     */
    private $empresaService;
    /**
     * @var Response
     */
    private $response;

    public function __construct(EmpresaService $empresaService, Response $response)
    {

        $this->empresaService = $empresaService;
        $this->response = $response;
    }

    public function create(Request $request)
    {
        try
        {
            $empresa = $this->empresaService->create($request->all());
            return $this->response->withItem($empresa, new EmpresaTransformer());
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }
}
