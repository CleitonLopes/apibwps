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
    /**
     * @var MenuService
     */
    private $menuService;

    public function __construct(EmpresaConfiguracaoRepository $empresaConfiguracaoRepository, EmpresaConfiguracaoValidator $empresaConfiguracaoValidator, MenuService $menuService)
    {
        $this->empresaConfiguracaoRepository = $empresaConfiguracaoRepository;
        $this->empresaConfiguracaoValidator = $empresaConfiguracaoValidator;
        $this->menuService = $menuService;
    }

    /**
     * @param array $data
     * Cria os dados da tabela empresa-configuracao
     * Se o resultado for true chama a classe menuService
     * @return bool|\Exception|ValidatorException
     * @throws ValidatorException
     */
    public function create(Array $data)
    {
        try
        {
            $this->empresaConfiguracaoValidator->with($data)->passesOrFail(ValidatorRules::RULE_CREATE);
            $idempresaconfiguracao = $this->findMax();
            $arr = array_merge($data, ['idempresaconfiguracao' => $idempresaconfiguracao]);

            if($this->empresaConfiguracaoRepository->create($arr))
            {
                return $this->menuService->create($data);
            }

            return false;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    /**
     * @return int
     * Busca o maior idempresaconfiguracao
     * @throws ValidatorException
     */
    public function findMax()
    {
        try
        {
            $idempresaconfiguracao = EmpresaConfiguracao::max('idempresaconfiguracao');
            return $idempresaconfiguracao + 1;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }
}