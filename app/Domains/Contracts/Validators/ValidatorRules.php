<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 04/11/2016
 * Time: 16:21
 */

namespace App\Domains\Contracts\Validators;


interface ValidatorRules
{
    const RULE_CREATE   = 'create';
    const RULE_UPDATE   = 'update';
    const RULE_FIND     = 'find';
    const RULE_FIND_ALL = 'find_all';
    const RULE_DELETE   = 'delete';
}