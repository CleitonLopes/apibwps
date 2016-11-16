<?php

namespace App\Validators;

use App\Domains\Contracts\Validators\ValidatorRules;
use \Prettus\Validator\LaravelValidator;

class EmpresaValidator extends LaravelValidator
{

    protected $rules = [

        ValidatorRules::RULE_CREATE => [

            'idempresa' => 'required|integer',
           'razaosocial' => 'required|string',
           'razaolst' => 'required|string',
           'fantasia' => 'required|string',
           'cpfcnpj' => 'required|string|max:14',
           'ie' => 'required|string',
           'fisicajuridica' => 'string',
           'cep' => 'string',
           'logradouro' => 'string',
           'endereco' => 'string',
           'numero' => 'string',
           'bairro' => 'string',
           'complemento' => 'string',
           'idmunicipio' => 'string',
           'idempresamunicipio' => 'string',
           'site' => 'string',
           'inscricaomunicipal' => 'string',
           'cnae' => 'string',
           'crt' => 'string',
           'serienfs' => 'string',
           'especienfs' => 'string',
           'sequencianfs' => 'string',
           'tipoambientenfs' => 'string',
           'senhanfs' => 'string',
           'regimeempresa' => 'string',
           'percaliquota_simples' => 'string',
           'datacadastro' => 'string',
           'serienfe' => 'string',
           'sequencianfe' => 'string',
           'tipoambientenfe' => 'string',
           'serienfescan' => 'string',
           'sequencianfescan' => 'string',
           'tipoemissaonfe' => 'string',
           'certificadodigital' => 'string',
           'senhacertificadodigital' => 'string',
           'modelodocfiscal' => 'string',
           'diasatrazo' => 'string'
        ],

        ValidatorRules::RULE_UPDATE => [
            'idempresa' => 'required|integer',
            'razaosocial' => 'required|string',
            'razaolst' => 'required|string',
            'fantasia' => 'required|string',
            'cpfcnpj' => 'required|string|max:14',
            'ie' => 'required|string',
            'fisicajuridica' => 'string',
            'cep' => 'string',
            'logradouro' => 'string',
            'endereco' => 'string',
            'numero' => 'string',
            'bairro' => 'string',
            'complemento' => 'string',
            'idmunicipio' => 'string',
            'idempresamunicipio' => 'string',
            'site' => 'string',
            'inscricaomunicipal' => 'string',
            'cnae' => 'string',
            'crt' => 'string',
            'serienfs' => 'string',
            'especienfs' => 'string',
            'sequencianfs' => 'string',
            'tipoambientenfs' => 'string',
            'senhanfs' => 'string',
            'regimeempresa' => 'string',
            'percaliquota_simples' => 'string',
            'datacadastro' => 'string',
            'serienfe' => 'string',
            'sequencianfe' => 'string',
            'tipoambientenfe' => 'string',
            'serienfescan' => 'string',
            'sequencianfescan' => 'string',
            'tipoemissaonfe' => 'string',
            'certificadodigital' => 'string',
            'senhacertificadodigital' => 'string',
            'modelodocfiscal' => 'string',
            'diasatrazo' => 'string'
        ],

        ValidatorRules::RULE_DELETE => [
            'idempresa' => 'required|integer'
        ]

   ];
}
