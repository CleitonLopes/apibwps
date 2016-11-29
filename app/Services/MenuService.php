<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 07/11/2016
 * Time: 17:00
 */

namespace App\Services;



use App\Domains\Contracts\Repositories\MenuRepository;
use App\Domains\Contracts\Validators\ValidatorRules;
use App\Entities\Menu;
use App\Validators\MenuValidator;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Exceptions\ValidatorException;

class MenuService
{


    /**
     * @var MenuRepository
     */
    private $menuRepository;
    /**
     * @var MenuValidator
     */
    private $menuValidator;
    /**
     * @var Storage
     */
    private $storage;

    public function __construct(MenuRepository $menuRepository, MenuValidator $menuValidator, Storage $storage)
    {

        $this->menuRepository = $menuRepository;
        $this->menuValidator = $menuValidator;
        $this->storage = $storage;
    }

    /**
     * @param array $data
     * Cria a estrutura do menu com idparametroempresa 0 por padrao
     * Chama a classe que faz update com o idparamentroempresa corrego
     * @return bool|\Exception|ValidatorException
     */
    public function create(Array $data)
    {
        try
        {
            $this->menuValidator->with(['idparametroempresa' => $data['idparametroempresa']])->passesOrFail(ValidatorRules::RULE_CREATE);

            $conn = DB::connection('mysql-flex-admin');

            $content = $this->storage->get('sql/menu.sql');

            $sql = explode(';', $content);
            $sql = preg_replace('/\s/',' ',$sql);

            foreach ($sql as $key => $item)
            {
               if($item != "  ")
               {
                   $conn->statement($item);
               }
            }

            $this->update($conn, $data['idparametroempresa']);

           return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    /**
     * @param $conn
     * @param $idparametroempresa
     * @return \Exception|mixed|ValidatorException
     */
    public function update($conn, $idparametroempresa)
    {
        try
        {
            return $conn->update("update menu set idparametroempresa = {$idparametroempresa} where idparametroempresa = ?", ['0']);

           // return $this->menuRepository->update($data, $data['idparametroempresa']);
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

}