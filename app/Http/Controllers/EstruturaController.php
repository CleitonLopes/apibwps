<?php

namespace App\Http\Controllers;

use App\Services\EstruturaService;
use App\Services\Utils\ResponseService;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;

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
    private $responseService;

    public function __construct(EstruturaService $estruturaService, ResponseService $responseService)
    {
        $this->estruturaService = $estruturaService;
        $this->responseService = $responseService;
    }

    public function create(Request $request)
    {
        try
        {
            $estrutura = $this->estruturaService->create($request->all());
            return $this->responseService->createResponse("200", $estrutura);
        }
        catch(ValidatorException $exception)
        {
            return  $this->responseService->errorWrongArgs($exception->getMessageBag());
        }
    }
}
