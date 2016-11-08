<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Transformers\MenuTransformer;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MenuController extends Controller
{
    /**
     * @var MenuService
     */
    private $menuService;
    /**
     * @var Response
     */
    private $response;

    public function __construct(MenuService $menuService, Response $response)
    {

        $this->menuService = $menuService;
        $this->response = $response;
    }

    public function find()
    {
        try
        {

        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }

    }

    public function findById($id)
    {
        try
        {
            $menu = $this->menuService->findById($id);
            return $this->response->withItem($menu, new MenuTransformer());
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
            $menu = $this->menuService->create($request->all());
            return $this->response->getStatusCode();
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }

}
