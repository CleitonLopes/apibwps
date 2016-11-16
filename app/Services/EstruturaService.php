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
use Illuminate\Support\Facades\Config;
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
    /**
     * @var EmpresaService
     */
    private $empresaService;

    public function __construct(EstruturaValidator $estruturaValidator, Storage $storage, EmpresaService $empresaService)
    {

        $this->estruturaValidator = $estruturaValidator;
        $this->storage = $storage;
        $this->empresaService = $empresaService;
    }

     public function create(Array $data)
     {
         try
         {
             $dadosConexao = Funcoes::trataArrayDadosConexao($data['dados_conexao']);
             $idempresa = Funcoes::trataArrayIDEmpresa($data['idempresa']);

             SetDatabase::setDatabase($dadosConexao['host'], $dadosConexao['dbname'], $dadosConexao['user'], $dadosConexao['pass']);

             $conn = DB::connection('mysql');

             $this->estruturaValidator->with($dadosConexao)->passesOrFail(ValidatorRules::RULE_CREATE);

             $content = $this->storage->get('sql/bwpsteste.sql');

             $sql = Funcoes::trataSql($content);

            /*foreach($sql as $key => $item)
             {
                 if($item != "")
                 {
                     $conn->statement($item);
                 }
             }

             if(!$this->createClassFiscal($conn))
             {
                 return false;
             }

             if(!$this->createCest($conn))
             {
                 return false;
             }

             if(!$this->createMunicipio($conn))
             {
                 return false;
             }

             if(!$this->empresaService->create($data))
             {
                 return false;
             }

             if(!$this->deleteEmpresaConfiguracao($conn))
             {
                 return false;
             }

             if(!$this->deleteCfop($conn))
             {
                return false;
             }

             if(!$this->updateCst($conn, $idempresa))
             {
                 return false;
             }

             if(!$this->createCfop($conn, $idempresa))
             {
                 return false;
             }

             if(!$this->createEmpresaConfiguracao($conn, $idempresa))
             {
                 return false;
             }

             if(!$this->updateClassFiscal($conn, $idempresa))
             {
                 return false;
             }

             if(!$this->updateFormaPagamento($conn, $idempresa))
             {
                 return false;
             }

             if(!$this->updateMunicipio($conn, $idempresa))
             {
                 return false;
             }

             if(!$this->updatePermissaoUsuario($conn, $idempresa))
             {
                 return false;
             }

             if(!$this->updateTipoProduto($conn, $idempresa))
             {
                 return false;
             }*/

             if(!$this->updateTributos($conn, $idempresa))
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

    public function createClassFiscal($conn)
    {
        try
        {
            $content = $this->storage->get('sql/class_fiscal.sql');

            $sql = Funcoes::trataSql($content);

            foreach($sql as $key => $item)
            {
                if($item != " ")
                {
                    $conn->statement($item);
                }
            }

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function createCest($conn)
    {
        try
        {
            $content = $this->storage->get('sql/cest.sql');

            $sql = Funcoes::trataSqlCest($content);

            foreach($sql as $key => $item)
            {
                if($item != " ")
                {
                    $conn->statement($item);
                }
            }

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function createMunicipio($conn)
    {
        try
        {
            $content = $this->storage->get('sql/municipio.sql');

            $sql = Funcoes::trataSql($content);

            foreach($sql as $key => $item)
            {
                if($item != " ")
                {
                    $conn->statement($item);
                }
            }

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function deleteEmpresaConfiguracao($conn)
    {
        try
        {
            $conn->delete('delete from empresa_configuracao where idempresaconfiguracao = ?', [1]);

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function deleteCfop($conn)
    {
        try
        {
            $conn->delete('delete from cfop');

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function updateCst($conn, $data)
    {
        try
        {
            $conn->update("update cst set idempresa = {$data['idempresa']}");

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function createCfop($conn, $data)
    {
        try
        {
            $arr = [
                array("insert into cfop VALUES (1111,'COMPRA PARA INDUSTRIALIZACAO OU PRODUCAO RURAL','NENHUM','N','S','N','N','N','N','N','N','N','N','N','N','N',1,1,1,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','500','112',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-02-12','{$data['idempresa']}')"),
                array("insert into cfop VALUES (1112,'COMPRA PARA COMERCIALIZACAO','TESTE','S','N','S','S','N','N','N','N','N','N','N','N','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','900','900',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-02-11','{$data['idempresa']}')"),
                array("insert into cfop VALUES (1202,'DEVOLUCAO DE VENDA DE MERCADORIA ADQUIRIDA OU RECEBIDA DE TE',NULL,'N','N','N','N','N','N','N','N','N','N','N','S','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','900','900',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-11-03','{$data['idempresa']}')"),
                array("insert into cfop VALUES (1403,'COMPRA DE PRODUTO  COM ST',NULL,'S','N','S','N','N','N','N','N','N','N','N','N','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','900','900',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-05-12','{$data['idempresa']}')"),
                array("insert into cfop VALUES (2112,'COMPRA PARA COMERCIALIZACAO','TESTE','N','N','N','N','N','N','N','N','N','N','N','N','N',1,1,2,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','202',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-02-12','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5102,'VENDA DE MERCADORIA ADQUIRIDA OU RECEBIDA DE TERCEIROS',NULL,'S','S','S','N','N','N','S','N','N','N','N','N','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}',NULL,'102','101',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-02-27','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5112,'VENDA DE MERCADORIA ADQUIRIDA OU RECEBIDA DE TERCEIROS',NULL,'S','S','S','N','N','N','S','N','N','N','N','N','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','112','111',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-02-27','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5201,'DEVOLUCAO DE COMPRA PARA INDUSTRIALIZACAO',NULL,'N','N','N','N','N','N','N','N','N','N','N','S','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','900','900',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-11-03','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5405,'VENDA DE ST',NULL,'S','S','S','N','N','N','S','N','S','N','N','N','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','500','201',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-05-05','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5656,'VENDA DE COMBUSTIVEL OU LIBRIFICANTE',NULL,'S','N','N','N','N','N','N','N','N','N','N','N','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','500','201',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-09-05','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5910,'BRINDE',NULL,'S','N','S','N','N','N','N','N','N','N','N','N','S',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','900','900',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-05-12','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5933,'PRESTACAO SERVICO',NULL,'N','S','N','N','S','N','S','N','S','N','N','N','N',1,1,1,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','900',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-09-24','{$data['idempresa']}')"),
                array("insert into cfop VALUES (5949,'OUTRA SAIDAS DE MERC OU PRESTAO DE SERVICO NAO ESPECIFICADOS',NULL,'N','S','S','N','N','N','S','N','N','S','N','N','N',4,4,1,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','400','400',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-20','{$data['idempresa']}')"),
                array("insert into cfop VALUES (6111,'VENDA DE PRODUCAO DO ESTABELECIMENTO','TESTE','N','N','N','N','N','N','N','N','N','N','N','N','N',1,1,1,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','400',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-02-12','{$data['idempresa']}')"),
                array("insert into cfop VALUES (6112,'VENDA DE MERCADORIA ADQUIRIDA OU RECEBIDA DE TERCEIROS',NULL,'S','N','N','N','N','N','N','N','N','N','N','N','N',1,1,1,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','111',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-02-11','{$data['idempresa']}')"),
                array("insert into cfop VALUES (6404,'VENDA ST FORA DO ESTADO',NULL,'S','S','S','N','N','N','S','N','S','N','N','N','N',4,4,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','500','201',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-05-05','{$data['idempresa']}')"),
                array("insert into cfop VALUES (111299,'ENTRADA COM REQUISICAO','ENTRADA  PARA ACERTO DE ESTOQUE','S','N','S','N','N','N','N','S','N','N','N','N','N',5,5,NULL,'{$data['idempresa']}','{$data['idempresa']}','{$data['idempresa']}','900','400',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-08-25','{$data['idempresa']}')")
            ];

            foreach($arr as $item)
            {
              $conn->insert($item[0]);
            }

            return true;

        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function createEmpresaConfiguracao($conn, $data)
    {
        try
        {
            $empresaConfiguracao = "INSERT INTO empresa_configuracao VALUES(1,'{$data['idempresa']}',0,0,1,8.00,12.00,1.00,2.00,666.66,9.00,9.99,5000.00,5933,'{$data['idempresa']}','N',NULL,NULL,'T',NULL,NULL,5405,'{$data['idempresa']}','1','refrimar@hotmail.com','mariajulia2014','587','smtp.mail.com','tls','Descrição da observação da ordem de serviço',NULL,NULL,'N','Empresa optante pelo Simples Nacional',360,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,0,NULL,NULL,'N','S','S')";

            $conn->insert($empresaConfiguracao);

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function updateClassFiscal($conn, $data)
    {
        try
        {
            $conn->update("update class_fiscal set idempresa = '{$data['idempresa']}'");

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function updateFormaPagamento($conn, $data)
    {
        try
        {
            $conn->update("update forma_pagamento set idempresa = '{$data['idempresa']}'");

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function updateMunicipio($conn, $data)
    {
        try
        {
            $conn->update("update municipio set idempresa = '{$data['idempresa']}'");

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function updatePermissaoUsuario($conn, $data)
    {
        try
        {
            $conn->update("update permissaousuario set idempresa = '{$data['idempresa']}'");

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function updateTipoProduto($conn, $data)
    {
        try
        {
            $conn->update("update tipo_produto set idempresa = '{$data['idempresa']}', idempresacfopdentrouf = '{$data['idempresa']}', idempresacfopforauf = '{$data['idempresa']}'");

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

    public function updateTributos($conn, $data)
    {
        try
        {
            $conn->update("update tributos set idempresa = '{$data['idempresa']}', idempresaaliquotaecf = '{$data['idempresa']}'");

            return true;
        }
        catch(ValidatorException $exception)
        {
            return $exception;
        }
    }

}