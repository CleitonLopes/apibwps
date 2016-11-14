<?php

namespace App\Http\Controllers;

use App\Services\EstruturaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class EstruturaController extends Controller
{

    /**
     * @var EstruturaService
     */
    private $estruturaService;
    /**
     * @var Response
     */
    private $response;

    public function __construct(EstruturaService $estruturaService, Response $response)
    {
        $this->estruturaService = $estruturaService;
        $this->response = $response;
    }

    public function create(Request $request)
    {
        try
        {
            $estrutura = $this->estruturaService->create($request->all());

            if($estrutura)
            {
                return $this->response->getStatusCode();
            }
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }
}
