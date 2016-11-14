<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 07/11/2016
 * Time: 14:53
 */

namespace App\Services;


use App\Domains\Contracts\Repositories\EmpresaConfiguracaoRepository;
use App\Domains\Contracts\Validators\ValidatorRules;
use App\Entities\EmpresaConfiguracao;

use App\Validators\EmpresaConfiguracaoValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class EmpresaConfiguracaoService
{
    /**
     * @var EmpresaConfiguracaoRepository
     */
    private $empresaConfiguracaoRepository;
    /**
     * @var EmpresaConfiguracaoValidator
     */
    private $empresaConfiguracaoValidator;

    public function __construct(EmpresaConfiguracaoRepository $empresaConfiguracaoRepository, EmpresaConfiguracaoValidator $empresaConfiguracaoValidator)
    {
        $this->empresaConfiguracaoRepository = $empresaConfiguracaoRepository;
        $this->empresaConfiguracaoValidator = $empresaConfiguracaoValidator;
    }

    public function find()
    {
        try
        {
            return $this->empresaConfiguracaoRepository->all();
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
            $this->empresaConfiguracaoValidator->with($data)->passesOrFail(ValidatorRules::RULE_CREATE);
            $idempresaconfiguracao = $this->findMax();
            $arr = array_merge($data, ['idempresaconfiguracao' => $idempresaconfiguracao]);
            return $this->empresaConfiguracaoRepository->create($arr);
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
            $idempresaconfiguracao = EmpresaConfiguracao::max('idempresaconfiguracao');
            return $idempresaconfiguracao + 1;
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }

    public function update(Array $data)
    {
        try
        {
            $this->empresaConfiguracaoValidator->with($data)->passesOrFail(ValidatorRules::RULE_UPDATE);
            return $this->empresaConfiguracaoRepository->update($data, $data['idparametroempresa']);
        }
        catch(ValidatorException $exception)
        {
            throw $exception;
        }
    }
}