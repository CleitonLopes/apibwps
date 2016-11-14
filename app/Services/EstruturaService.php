<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 14/11/2016
 * Time: 15:07
 */

namespace App\Services;


use App\Domains\Contracts\Validators\ValidatorRules;
use App\Services\Utils\Funcoes;
use App\Validators\EstruturaValidator;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Exceptions\ValidatorException;

class EstruturaService
{

    /**
     * @var EstruturaValidator
     */
    private $estruturaValidator;
    /**
     * @var Storage
     */
    private $storage;

    public function __construct(EstruturaValidator $estruturaValidator, Storage $storage)
    {

        $this->estruturaValidator = $estruturaValidator;
        $this->storage = $storage;
    }

     public function create(Array $data)
     {
         try
         {
             SetDatabase::setDatabase($data['host'], $data['dbname'], $data['user'], $data['pass']);

             $estrutura = DB::connection('mysql');

             $this->estruturaValidator->with($data)->passesOrFail(ValidatorRules::RULE_CREATE);

             $content = $this->storage->get('sql/bwpsteste.sql');

             $sql = Funcoes::trataSql($content);

             foreach($sql as $key => $item)
             {
                 if($item != "")
                 {
                    $estrutura->statement($item);
                 }
             }

             if(!$this->createClassFiscal($data))
             {
                 return false;
             }

             if(!$this->createCest($data))
             {
                 return false;
             }

             return true;

         }
         catch(ValidatorException $exception)
         {
             return $exception;
         }
     }

    public function createClassFiscal($data)
    {
        try
        {
            SetDatabase::setDatabase($data['host'], $data['dbname'], $data['user'], $data['pass']);

            $estrutura = DB::connection('mysql');

            $content = $this->storage->get('sql/class_fiscal.sql');

            $sql = Funcoes::trataSql($content);

            foreach($sql as $key => $item)
            {
                if($item != " ")
                {
                    $estrutura->statement($item);
                }
            }

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function createCest($data)
    {
        try
        {
            SetDatabase::setDatabase($data['host'], $data['dbname'], $data['user'], $data['pass']);

            $estrutura = DB::connection('mysql');

            $content = $this->storage->get('sql/cest.sql');

            $sql = Funcoes::trataSqlCest($content);


            foreach($sql as $key => $item)
            {
                if($item != " ")
                {
                    $estrutura->statement($item);
                }
            }

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function createMunicipio($data)
    {
        try
        {
            SetDatabase::setDatabase($data['host'], $data['dbname'], $data['user'], $data['pass']);

            $estrutura = DB::connection('mysql');

            $content = $this->storage->get('sql/class_fiscal.sql');

            $sql = Funcoes::trataSql($content);
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

}