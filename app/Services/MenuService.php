<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 07/11/2016
 * Time: 17:00
 */

namespace App\Services;



use App\Repositories\MenuRepository;
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

    public function findById($id)
    {
        try
        {
            $this->menuValidator->with(['idparametroempresa' => $id])->passesOrFail(ValidatorRules::RULE_FIND);
            return $this->menuRepository->find($id);
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }


    public function create(Array $data)
    {
        try
        {
            SetDatabase::setDatabase($data['host'], $data['dbname'], $data['user'], $data['pass']);

            $content = $this->storage->get('sql/teste.sql');

            $sql = explode(';', $content);

            //dd($sql);

            foreach ($sql as $key => $item)
            {
               if($item != '')
               {
                   DB::statement($item);
               }
            }

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

}