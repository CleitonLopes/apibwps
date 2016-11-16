<?php

namespace App\Validators;

use App\Domains\Contracts\Validators\ValidatorRules;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EstruturaValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorRules::RULE_CREATE => [
            'host'          => 'required|string',
            'user'          => 'required|string',
            'pass'          => 'string',
            'dbname'        => 'required|string',
        ],


        ValidatorRules::RULE_UPDATE => [
            'idempresa' => 'required|integer'
        ],
   ];
}
