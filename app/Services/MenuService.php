<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 07/11/2016
 * Time: 17:00
 */

namespace App\Services;


use App\Domains\Contracts\Validators\ValidatorRules;
use App\Repositories\MenuRepository;
use App\Repositories\MenuRepositoryEloquent;
use App\Validators\MenuValidator;
use Faker\Provider\bn_BD\Utils;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Exceptions\ValidatorException;

class MenuService
{
    /**
     * @var MenuRepositoryEloquent
     */
    private $menuRepository;
    /**
     * @var MenuValidator
     */
    private $menuValidator;



    public function __construct(MenuRepository $menuRepository, MenuValidator $menuValidator)
    {
        $this->menuRepository = $menuRepository;
        $this->menuValidator = $menuValidator;
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


            $content = Storage::get('sql/bancobwps2.sql');

            $sql = "
                    CREATE TABLE `acesso_conhecido` (
                      `idipconhecido` int(11) NOT NULL AUTO_INCREMENT,
                      `ip` varchar(100) NOT NULL,
                      `proprietario` varchar(100) NOT NULL,
                      `observacao` text,
                      `idempresa` int(11) NOT NULL,
                      PRIMARY KEY (`idipconhecido`,`idempresa`),
                      KEY `ip` (`ip`)
                    );";


           DB::statement($sql);

           // dd($content);








            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

}