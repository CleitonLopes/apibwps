<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 16/11/2016
 * Time: 10:42
 */

namespace App\Services;


use App\Domains\Contracts\Repositories\EmpresaRepository;
use App\Domains\Contracts\Validators\ValidatorRules;
use App\Services\Utils\Funcoes;
use App\Validators\EmpresaValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class EmpresaService
{
    /**
     * @var EmpresaRepository
     */
    private $empresaRepository;
    /**
     * @var EmpresaValidator
     */
    private $empresaValidator;

    public function __construct(EmpresaRepository $empresaRepository, EmpresaValidator $empresaValidator)
    {

        $this->empresaRepository = $empresaRepository;
        $this->empresaValidator = $empresaValidator;
    }

    public function create(Array $data)
    {
        try
        {
            $dadosConexao = Funcoes::trataArrayDadosConexao($data['dadosConexao']);

            SetDatabase::setDatabase($dadosConexao['host'], $dadosConexao['db'], $dadosConexao['user'], $dadosConexao['pass']);

            $dadosEmpresa = Funcoes::trataArrayDadosEmpresa($data['dadosEmpresa']);
            $this->empresaValidator->with($dadosEmpresa)->passesOrFail(ValidatorRules::RULE_CREATE);

            return $this->empresaRepository->create($dadosEmpresa);

        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }
}