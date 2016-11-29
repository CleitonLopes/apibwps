<?php

namespace App\Validators;

use App\Domains\Contracts\Validators\ValidatorRules;
use \Prettus\Validator\LaravelValidator;

class EmpresaValidator extends LaravelValidator
{

    protected $rules = [

        ValidatorRules::RULE_CREATE => [

            'idempresa'                 => 'required|integer',
           'razaosocial'                => 'required|string',
           'razaolst'                   => 'required|string',
           'fantasia'                   => 'required|string',
           'cpfcnpj'                    => 'required|string|max:14',
           'ie'                         => 'required|string',
           'fisicajuridica'             => 'required|string',
           'cep'                        => 'required|string',
           'logradouro'                 => 'required|string',
           'endereco'                   => 'required|string',
           'numero'                     => 'required|string',
           'bairro'                     => 'required|string',
           'complemento'                => 'string',
           'idmunicipio'                => 'required|integer',
           'idempresamunicipio'         => 'required|integer',
           'site'                       => 'string',
           'inscricaomunicipal'         => 'string',
           'cnae'                       => 'string',
           'crt'                        => 'string',
           'serienfs'                   => 'string',
           'especienfs'                 => 'string',
           'sequencianfs'               => 'integer',
           'tipoambientenfs'            => 'string',
           'senhanfs'                   => 'string',
           'regimeempresa'              => 'string',
           'percaliquota_simples'       => 'string',
           'datacadastro'               => 'string',
           'serienfe'                   => 'string',
           'sequencianfe'               => 'integer',
           'tipoambientenfe'            => 'string',
           'serienfescan'               => 'string',
           'sequencianfescan'           => 'integer',
           'tipoemissaonfe'             => 'string',
           'certificadodigital'         => 'string',
           'senhacertificadodigital'    => 'string',
           'modelodocfiscal'            => 'string',
           'diasatrazo'                 => 'integer'
        ],

        ValidatorRules::RULE_DELETE => [
            'idempresa' => 'required|integer'
        ]

   ];
}
