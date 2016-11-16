<?php

/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 14/11/2016
 * Time: 16:28
 */

namespace App\Services\Utils;

class Funcoes
{
    public static function trataSql($file)
    {
        $sql = explode(';', $file);

        $sql = preg_replace('/\s/',' ',$sql);

        return $sql;
    }

    public static function trataSqlCest($file)
    {
        $sql = explode(';xy', $file);

        $sql = preg_replace('/\s/',' ',$sql);

        return $sql;
    }

    public static function trataArrayIDEmpresa($data)
    {
        $arr = [];

        foreach($data as $item)
        {
            $arr['idempresa'] = $item['idempresa'];
        }

        return $arr;
    }

    public static function trataArrayDadosConexao($data)
    {
        $arr =  [];


        foreach($data as $key => $item)
        {
            $arr['host'] = $item['host'];
            $arr['user'] = $item['user'];
            $arr['dbname'] = $item['dbname'];
            $arr['pass'] = $item['pass'];
        }

        return $arr;
    }

    public static function trataArrayDadosEmpresa($data)
    {

        $arr = [];

        foreach($data as $item)
        {

            $arr['idempresa']           = $item['idempresa'];
            $arr['razaosocial']         = $item['razaosocial'];
            $arr['razaolst']            = $item ['razaolst'];
            $arr['fantasia']            = $item['fantasia'];
            $arr['cpfcnpj']             = $item['cpfcnpj'];
            $arr['ie']                  = $item['ie'];
            $arr['fisicajuridica']      = $item['fisicajuridica'];
            $arr['cep']                 = $item['cep'];
            $arr['logradouro']          = $item['logradouro'];
            $arr['endereco']            = $item['endereco'];
            $arr['numero']              = $item['numero'];
            $arr['bairro']              = $item['bairro'];
            $arr['complemento']         = $item['complemento'];
            $arr['idmunicipio']         = $item['idmunicipio'];
            $arr['idempresamunicipio']  = $item['idempresamunicipio'];
            $arr['site']                = $item['site'];
            $arr['inscricaomunicipal']  = $item['inscricaomunicipal'];
            $arr['cnae']                = $item['cnae'];
            $arr['crt']                 = $item['crt'];
            $arr['serienfs']            = $item['serienfs'];
            $arr['especienfs']          = $item['especienfs'];
            $arr['sequencianfs']        = $item['sequencianfs'];
            $arr['tipoambientenfs']     = $item['tipoambientenfs'];
            $arr['senhanfs']            = $item['senhanfs'];
            $arr['regimeempresa']       = $item['regimeempresa'];
            $arr['percaliquota_simples']    = $item['percaliquota_simples'];
            $arr['datacadastro']            = $item['datacadastro'];
            $arr['serienfe']                = $item['serienfe'];
            $arr['sequencianfe']            = $item['sequencianfe'];
            $arr['tipoambientenfe']         = $item['tipoambientenfe'];
            $arr['serienfescan']            = $item['serienfescan'];
            $arr['sequencianfescan']        = $item['sequencianfescan'];
            $arr['tipoemissaonfe']          = $item['tipoemissaonfe'];
            $arr['certificadodigital']      = $item['certificadodigital'];
            $arr['senhacertificadodigital'] = $item['senhacertificadodigital'];
            $arr['modelodocfiscal']         = $item['modelodocfiscal'];
            $arr['diasatrazo']              = $item['diasatrazo'];
        }

        return $arr;
    }
}