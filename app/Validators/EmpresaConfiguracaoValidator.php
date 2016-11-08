<?php

namespace App\Validators;

use App\Domains\Contracts\Validators\ValidatorRules;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EmpresaConfiguracaoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorRules::RULE_CREATE => [
            'idparametroempresa'    => 'required|integer',
            'configuracao'          => 'required|string',
            'valor'                 => 'required|string'
        ],

        ValidatorRules::RULE_UPDATE => [
            'idparametroempresa'    => 'required|integer',
            'configuracao'          => 'string',
            'valor'                 => 'string'
        ],

        ValidatorRules::RULE_FIND => [
            'idparametroempresa' => 'required|integer'
        ],

        ValidatorRules::RULE_DELETE => [
            'idparametroempresa' => 'required|integer'
        ]
   ];
}
