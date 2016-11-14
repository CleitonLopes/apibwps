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

    public function find()
    {
        try
        {
            $empresasaconfiguracao = $this->empresaConfiguracaoService->find();
            return $this->response->withCollection($empresasaconfiguracao, new EmpresaConfiguracaoTransformer());
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
            $empresaconfiguracao = $this->empresaConfiguracaoService->create($request->all());
            return $this->response->withItem($empresaconfiguracao, new EmpresaConfiguracaoTransformer());
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $data = array_merge($request->all(), ['idparametroempresa' => $id]);
            $empresaconfiguracao = $this->empresaConfiguracaoService->update($data);
            dd($empresaconfiguracao);
            return $this->response->withItem($empresaconfiguracao, new EmpresaConfiguracaoTransformer());
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }
}
