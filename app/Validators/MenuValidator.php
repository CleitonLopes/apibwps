<?php

namespace App\Validators;

use App\Domains\Contracts\Validators\ValidatorRules;
use \Prettus\Validator\LaravelValidator;

class MenuValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorRules::RULE_CREATE => [
            'idparametroempresa' => 'required|integer'
        ],

        ValidatorRules::RULE_UPDATE => [
            'idparametroempresa'    => 'required|integer'
        ],

        ValidatorRules::RULE_FIND => [
            'idmenu' => 'required|integer'
        ],

        ValidatorRules::RULE_DELETE => [
            'idmenu' => 'required|integer'
        ]
   ];
}
