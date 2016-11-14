<?php

/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 04/11/2016
 * Time: 10:58
 */

namespace App\Services;

use App\Domains\Contracts\Repositories\ParametroEmpresaRepository;
use App\Domains\Contracts\Validators\ValidatorRules;
use App\Entities\ParametroEmpresa;
use App\Validators\ParametroEmpresaValidator;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Exceptions\ValidatorException;

class ParametroEmpresaService
{
    /**
     * @var ParametroEmpresaRepository
     */
    private $parametroEmpresaRepository;
    /**
     * @var ParametroEmpresaValidator
     */
    private $parametroEmpresaValidator;

    public function __construct(ParametroEmpresaRepository $parametroEmpresaRepository, ParametroEmpresaValidator $parametroEmpresaValidator)
    {

        $this->parametroEmpresaRepository = $parametroEmpresaRepository;
        $this->parametroEmpresaValidator = $parametroEmpresaValidator;
    }

    public function find()
    {
        try
        {
            $parametroEmpresa = $this->parametroEmpresaRepository->all();
            return $parametroEmpresa;
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }

    public function create(Array $data)
    {
        try
        {
            $this->parametroEmpresaValidator->with($data)->passesOrFail(ValidatorRules::RULE_CREATE);
            $idparametroempresa =  $this->findMax();
            $arr = array_merge($data, ['idparametroempresa' => $idparametroempresa]);

            return $this->parametroEmpresaRepository->create($arr);
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }

    public function findMax()
    {
        try
        {
            $idparametroempresa = ParametroEmpresa::max('idparametroempresa');
            return $idparametroempresa + 1;
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }
}