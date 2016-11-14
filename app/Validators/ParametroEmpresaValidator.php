<?php

namespace App\Validators;

use App\Domains\Contracts\Validators\ValidatorRules;
use \Prettus\Validator\LaravelValidator;


class ParametroEmpresaValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorRules::RULE_CREATE => [
            'idempresa'         => 'required|integer',
            'host'              => 'required|string',
            'port'              => 'required|string',
            'user'              => 'required|string',
            'pass'              => 'string',
            'db'                => 'required|string',
            'nome'              => 'required|string',
            'urlsitewps'        => 'string'
        ],

        ValidatorRules::RULE_UPDATE => [
            'idempresa'     => 'required|integer',
            'host'          => 'string',
            'port'          => 'string',
            'user'          => 'string',
            'pass'          => 'string',
            'db'            => 'string',
            'nome'          => 'string',
            'urlsitewps'    => 'string'
        ],

        ValidatorRules::RULE_FIND => [
            'idempresa' => 'required|integer'
        ],

        ValidatorRules::RULE_DELETE => [
            'idempresa' => 'required|integer'
        ]
   ];
}
