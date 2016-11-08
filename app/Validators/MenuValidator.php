<?php

namespace App\Validators;

use App\Domains\Contracts\Validators\ValidatorRules;
use \Prettus\Validator\LaravelValidator;

class MenuValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorRules::RULE_CREATE => [

        ],

        ValidatorRules::RULE_UPDATE => [

        ],

        ValidatorRules::RULE_FIND => [
            'idparametroempresa' => 'required|integer'
        ],

        ValidatorRules::RULE_UPDATE => [

        ]
   ];
}
